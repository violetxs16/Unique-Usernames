# Unique Usernames
The Unique Usernames project offers a dynamic solution for users to verify the availability of a username before finalizing their choice. Utilizing a dual-path approach, the project provides two scripts, each employing a distinct technology stack: HTML, PHP, and local file storage in Script 1, and HTML, PHP, and MySQL in Script 2.

Script 1: Local File Storage
In the first path, users are presented with an HTML form where they can enter their desired username. The PHP backend checks the availability of the username by reading from a local file. If the username has already been taken, the user is prompted to try a different one. If the username is unique, it is added to the local file, affirming the successful addition.

Script 2: MySQL Database Integration
In the second path, the project integrates a MySQL database for enhanced scalability. Again, users input their desired username through an HTML form, and the PHP backend queries the database to check for existing entries. If the username is already in use, the user receives a prompt to select another. If the username is unique, it is added to the MySQL database, signaling a successful addition.
