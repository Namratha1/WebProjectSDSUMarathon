# WebProjectSDSUMarathon

    A main html5 page, with information on the marathon and a link to sign up as a runner.
A signup page. This page has the following fields:

    Runner's Image
    First, Middle, and Last Name
    Address, two lines for address, plus City, State, and Zipcode
    Primary phone
    Email address
    Gender
    Date of Birth
    Medical Conditions (use a textarea)
    Experience level (Expert, Experienced, Novice)
    Category (Teen, Adult, Senior)

    AJAX to verify that the form to be submitted is not a duplicate.
    A php script that reads the parameters from the form and stores them in your MySQL database on opatija.sdsu.edu. We will discuss database design and a sample DB schema will be provided.
    You must also upload and store the runner's image on the server. Do not store the actual image in the MySQL database, store only the name and use a folder on the server for the image file.
    A report that gives the roster of the runners, grouped by category (teen, adult, senior) and alphabetized by last name. The report should contain the following information:
        Runner's last name, first name
        The runner's image
        Runner's age at the time the report is generated
        Runner's experience level.
        the report must be accessible only after a login.
    A confirmation page
