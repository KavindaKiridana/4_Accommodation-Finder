### 🚀 Accommodation Finder Website

**📂 Project Overview**

This project is an Accommodation Finder Website developed as part of a university assignment. The application is designed to streamline the process of finding and managing student accommodations. It incorporates roles such as Student, Admin, Warden, and Landlord to manage different aspects of the platform efficiently.

**✨ Features**

- **Student Role**
  - View available accommodations
  - Apply for accommodations
  - Manage booking history
- **Admin Role**
  - Oversee platform operations
  - Manage user accounts (students, landlords, and wardens)
- **Warden Role**
  - Manage on-campus accommodations
  - Monitor student activities within accommodations
- **Landlord Role**
  - List off-campus accommodations
  - Update availability and pricing
  - Communicate with students and respond to applications

**💻 Technologies Used**

- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP
- **Database:** MySQL
- **Tools:** Visual Studio Code, GitHub

**📋 System Requirements**

**Software Requirements**

- Web Server: XAMPP or LAMP stack for hosting the PHP application and MySQL database.
- Database: MariaDB (or MySQL equivalent) for handling the project database.
- Web Browser: Google Chrome, Mozilla Firefox, or any modern web browser.
- Programming Language: PHP (version 8.x recommended).

**🛠️ Development Tools**

- Code Editor: VS Code

**Installation and Setup**

1. Install Required Software

   - Download and install XAMPP for Windows or LAMP for Ubuntu to set up the Apache server and MariaDB database.
   - Ensure PHP is enabled within the server configuration.

2. Set Up the Project

   - Clone or download the project files into the htdocs folder (Windows) or /var/www/html folder (Ubuntu) of your web server.
   - Ensure the directory structure maintains all PHP files and assets (e.g., CSS, JS).

3. Configure the Database

   - Import the provided SQL dump into MariaDB:
     - Access phpMyAdmin or use the MySQL CLI.
     - Create a new database, e.g., accommodation_finder.
     - Import the SQL file into the database.
   - Update the database credentials in config.php to match your local environment.

4. Launch the Application

   - Start the web server and open your browser.
   - Navigate to http://localhost/[project-folder-name]/index.php to access the login page.

5. User Role Testing
   - Use the provided database data or create test users with specific roles (admin, student, etc.) to verify functionality.

** Usage Instructions**

- Students: Sign up and log in to search for accommodations.
- Admins: Log in to manage users and oversee operations.
- Wardens: Log in to monitor on-campus housing.
- Landlords: Sign up to list accommodations and manage bookings.

**📧 Contact**

For any queries or issues, contact the project maintainer:

- Email: kavindakiridena@gmail.com
- GitHub: [KavindaKiridana (Kavinda Kiridana)](https://github.com/KavindaKiridana)

Thank you for using the Accommodation Finder Website!




### 🚀 How to analysis PHP project using PHP_CodeSniffer

- _phpcs_ Search for bugs
- _phpcbf_ Search for bugs and fix them automatically

  **📂 Step by step guide to do it**
  1. First, you need to install PHP & Composer and then add them to the system environment variables.
  2. Install PHP CodeSniffer
     - copied and pasted this command given below on the terminal:
      ```
     composer global require "squizlabs/php_codesniffer=*"
     //After installation, ensure the phpcs command is available globally. You can check it by running:
     phpcs --version
      ```
  3. Analyze your PHP code by running the following commands given below in your project's root path's terminal.
      ```
     phpcs --standard=PSR12 .
      //--standard=PSR12: Specifies the PSR-12 coding standard.
     '.' Analyzes all files in the current directory.
      phpcbf --standard=PSR12 .
      //Automatically Fix Issues (Optional)
      ```
