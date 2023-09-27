# Puhastusproff OÜ Extranet

This project is the extranet for Puhastusproff OÜ, serving as a self-service platform for its customers. Customers can, for example, order cleaning services, communicate with the company, and view statistics about their orders.

## URLs

| Environment | URL                                                                                        |
| ----------- |--------------------------------------------------------------------------------------------|
| Live        | [extranet.puhastusproff.ee](https://extranet.puhastusproff.ee)                             |
| Staging     | [test.diarainfra.com/pp-extranet](https://test.diarainfra.com/pp-extranet)                 |
| Repo        | [github.com/henno/pp-extranet-2023](https://github.com/henno/pp-extranet-2023)             |
| Pivotal     | [www.pivotaltracker.com/n/projects/2559965](https://pivotaltracker.com/n/projects/2559965) |


## Getting Started

Below are the instructions to set up the project on your local machine for development and testing purposes.

### Prerequisites

- Ensure you have `php 8`, `npm`, `composer`, [MailHog](https://github.com/mailhog/MailHog) and `MariaDB` installed on your machine. You can use [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](https://www.wampserver.com/en/) to install PHP, Apache, and MariaDB on your machine for development purposes.

### Installation Steps

1. `npm install`
2. `composer install`
3. `cp config.php.sample config.php`
4. Configure Database and SMTP Settings in the Configuration File
5. Seed the Database. You can use [henno's refresh_database.bat](https://gist.github.com/henno/c238037a6954f1bd3039db35d19b0770) script to (re)seed the database quickly from the command line by putting this script in some directory on your path (for example `~/bin` if you are using Git Bash) and then running it from the command line in project root directory like so: `refresh_database.bat ppExtranet`.

### Running the Project
1. Start Apache and MariaDB from XAMPP.
2. Start MailHog
3. Visit [localhost/pp-extranet-2023](http://localhost/pp-extranet-2023) in your browser.
