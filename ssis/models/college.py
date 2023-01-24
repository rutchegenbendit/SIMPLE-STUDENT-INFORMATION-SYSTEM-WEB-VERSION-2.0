from . import cursor, db


class College:
    def __init__(
        self, 
        code: str = None,
        name: str = None
    ):
        
        self.code = code
        self.name = name


    def get_all(
        self, 
        page_num: int = None, 
        item_per_page: int = None, 
        paginate: bool = True
    ):
        
        if not paginate:
            return self.college_list()
        
        offset = (page_num - 1) * item_per_page
        
        query = f'''
            SELECT 
                college.code, 
                college.name, 
                COUNT(*) as courses
            FROM college
            JOIN course
                ON college.code = course.college
            LEFT JOIN (
                SELECT 
                    collegecode, 
                    COUNT(*) as student
                FROM students
                GROUP BY collegecode
            ) enrolled

            ON college.code = enrolled.collegecode
            GROUP BY college.code

            LIMIT {item_per_page} OFFSET {offset}
        '''
        
        cursor.execute(query)
        result = cursor.fetchall()
        
        colleges = [list(college) for college in result]
        college_codes = [code[0] for code in colleges]
        
        all_colleges = self.college_list()
        for college in all_colleges:
            c_code = college[0]
            if c_code not in college_codes:
                colleges.append([c_code, college[1], None, None])

        return colleges


    @staticmethod
    def get_total():
        """Return the number of registered colleges."""
        
        query = '''SELECT * FROM college'''
        
        cursor.execute(query)
        result = cursor.fetchall()
        total = len(result)
        return total


    def college_list(self):
        """Return all registered colleges."""
        
        query = '''
            SELECT code, name
            FROM college
        '''
        
        cursor.execute(query)
        result = cursor.fetchall()
        colleges = [list(college) for college in result]
        return colleges


    @staticmethod
    def get_departments():
        """Return a list of courses grouped together by college name"""
        
        query = '''
            SELECT college.code, course.name
            FROM college
            JOIN course
            ON college.code = course.college
        '''
        
        cursor.execute(query)
        result = cursor.fetchall()
        departments = [list(department) for department in result]
        return departments


    def search(self, keyword: str = None, field: str = None):
        keyword = keyword.upper()
        colleges = self.get_all(paginate=False)

        result = []
        if field is None: 
            result = self.search_by_field(colleges, keyword, 'all')
        elif field == 'code':
            result = self.search_by_field(colleges, keyword, 'code')
        elif field == 'name':
            result = self.search_by_field(colleges, keyword, 'name')
        elif field == 'coursecount':
            result = self.search_by_field(colleges, keyword, 'coursecount')
        elif field == 'studentcount':
            result = self.search_by_field(colleges, keyword, 'studentcount')

        return result


    @staticmethod
    def search_by_field(rows: list = None, keyword: str = None, field: str = None):
        result = []
        for row in rows:
            row_allcaps = [str(cell).upper() for cell in row]

            if field == 'all':
                if keyword in row_allcaps:
                    result.append(row)
            if field == 'code':
                if keyword == row_allcaps[0]:
                    result.append(row)
                    return result
            elif field == 'name':
                if keyword == row_allcaps[1]:
                    result.append(row)
            elif field == 'coursecount':
                if keyword in row_allcaps[2]:
                    result.append(row)
            elif field == 'studentcount':
                if keyword in row_allcaps[3]:
                    result.append(row)

        return result


    def add_new(self):
        query = f'''
            INSERT INTO college (
                code,
                name
            )
            VALUES (
                '{self.code}',
                '{self.name}'
            )
        '''
        
        cursor.execute(query)
        db.commit()
        return None
    

    @staticmethod
    def delete(code: str = None):
        query = f'''
            DELETE FROM college
            WHERE code='{code}'
        '''
        
        cursor.execute(query)
        db.commit()
        return None


    def update(self):
        query = f'''
            UPDATE college
            SET 
                code = '{self.code}',
                name = '{self.name}'
            WHERE
                code = '{self.code}'
        '''

        cursor.execute(query)
        db.commit()
        return None


    @staticmethod
    def get_collegecode_for(course_name: str = None):
        query = f'''
            SELECT code
            FROM college
            WHERE name = '{course_name}'
        '''

        cursor.execute(query)
        code = cursor.fetchone()[0]
        return code


    @staticmethod
    def get_collegecodes():
        """Return all college codes"""
        
        query = '''
            SELECT code
            FROM college
        '''
        
        cursor.execute(query)
        result = cursor.fetchall()
        CODES = [code[0] for code in result]
        return CODES
