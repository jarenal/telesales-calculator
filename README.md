#Welcome to Telesales Calculator!

This script calculates when to pay to telesales staff.

##REQUIREMENTS

This scrip requires the next packages for to work.

- [pear/console_table](https://github.com/pear/Console_Table): Used for to draw pretty tables through terminal.
- [phpunit/phpunit](https://github.com/sebastianbergmann/phpunit): (Optional) Used for to run the unitary tests. (Requires PHP >= 5.6.0)

##INSTALL

Download the source code to your server and then execute the next command from the terminal:

```bash
	$ composer install
```

The above command will install all the dependencies required automatically.

NOTICE: You need to have composer installed in your system, for more information follow the next link [How install composer?](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

##USAGE

Simply call the script (be sure have execution permissions)...

```bash
	$ ./telesales-calculator.php
```

...and the script will show you the help through the terminal.

Below you have a briefing of the help shown by the script:

	Description:

	    This script calculates when to pay to telesales staff.

	Usage:

		telesales-calculator.php [command] [options]

	Available commands:

	  run     Execute the script.

	Optional arguments:

	  -h, --help             Show this help message.
	  -o, --output_file      (Optional) Output file. Without output file the script will return the output through the terminal.
	  -s, --date_start       (Optional) Start date "yyyy-mm-dd". The start date from which calculate the salaries date, otherwise will use the current date.
	  -e, --date_end         (Optional) End date "yyyy-mm-dd". The end date for to calculate the salaries date, otherwise will be one year from the start date.


##EXAMPLES

- Generate a CSV file with the payment dates for the next 12 months.

```bash
		$ ./telesales-calculator.php run --output_file=report.csv
```

- Show through the terminal the payment dates for the given dates.

```bash
		$ ./telesales-calculator.php run -s 2017-01-01 -e 2017-03-01
```
or

```bash
		$ ./telesales-calculator.php run --date_start=2017-01-01 --date_end=2017-03-01
```

NOTICE: Always will start from the next month from the given date. So the above example will output the dates for Febru

##TESTS

If you want run the test, you can use the next command:

```bash
		$ phpunit --bootstrap vendor/autoload.php src/Jarenal/Tests
```

NOTE: Before run the tests you will need install:

- [Install PHPUNIT globally](https://phpunit.de/manual/current/en/installation.html)
- [phpunit/phpunit](https://github.com/sebastianbergmann/phpunit) package through composer.










