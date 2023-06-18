# Examoes - Online Examination Management System

Examoes is a web-based application designed to manage online examinations. It provides features for teachers to create exams, students to take exams with anti-malpractice measures, and an accountant to manage student results.

## Features

1. Teacher Features:
   - Create exams with multiple-choice questions.
   - Set time limits and assign marks to each question.
   - Add instructions and other details for students.
   - Preview exams before making them available to students.
   - View and manage student results.

2. Student Features:
   - Log in securely with their credentials.
   - Access assigned exams and instructions.
   - Take exams with anti-malpractice measures:
     - Prompt message when changing tabs or windows during the exam.
     - Automatic exam submission after three attempts to change tabs or windows.
     - Copying questions is disabled.
   - Submit completed exams and receive immediate feedback.
   - View results for exams they have taken, excluding students with uncleared fees.

3. Accountant Features:
   - Manage student fee payments and clearances.
   - Control visibility of student results based on fee clearance status.
   - Generate reports on fee payments and cleared students.

## Technology Stack

- Frontend:
  - HTML
  - CSS
  - Bootstrap
  - JavaScript

- Backend:
  - PHP
  - MySQL (Database Management System)

## System Requirements

To run Examoes on your local machine, ensure that you have the following:

- Web server software (e.g., Apache, Nginx)
- PHP version 7 or above
- MySQL database server
- A compatible web browser (e.g., Chrome, Firefox)

## Installation

1. Clone the Examoes repository from GitHub:
   ```
   git clone https://github.com/exampleuser/examoes.git
   ```

2. Import the `database.sql` file into your MySQL database.

3. Configure the database connection in the `config.php` file located in the `backend` directory:
   ```php
   <?php
   $host = 'localhost';
   $database = 'examoes_exam';
   $username = 'root';
   $password = '';
   ...
   ```

4. Upload the `examoes` directory to your web server's root directory.

5. Open your web browser and access the Examoes application using the URL:
   ```
   http://localhost/examoes
   ```

## Usage

1. Teacher:
   - Log in with your credentials.
   - Create exams by providing the necessary details, questions, and answers.
   - Preview the exam before making it available to students.
   - Manage student results and view reports.

2. Student:
   - Log in with your credentials.
   - Access the assigned exams and read the instructions carefully.
   - Take the exams within the specified time limits.
   - Be cautious not to change tabs or windows, as it will prompt a message and may result in automatic exam submission.
   - Complete the exam and submit it.
   - View your exam results once available.

3. Accountant:
   - Log in with your credentials.
   - Manage student fee payments and clearances.
   - Generate reports on fee payments and cleared students.

## Security Considerations

1. Ensure that the server hosting Examoes is properly secured and up-to-date with security patches.

2. Protect database access credentials and use secure connections.

3. Regularly backup the database to prevent data loss.

4. Implement user authentication and authorization mechanisms to ensure only authorized users can access the application.

5. Apply input validation and sanitization to prevent SQL injection and other security vulnerabilities.
