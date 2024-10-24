to run it use :

||||||||||||||||||||||||||-

to install docker :

curl -fsSL https://get.docker.com/rootless | sh
export PATH=$HOME/bin:$PATH
export DOCKER_HOST=unix://$XDG_RUNTIME_DIR/docker.sock

||||||||||||||||||||||||||||

upodate the composer :
docker-compose run composer update
||||||||||||||||||||

docker-compose logs app
docker-compose logs web
docker-compose logs db





the database :
Here's a summary of the purpose and use of each table for your Laravel quiz project, which you can include in your `README.md` or documentation.

### 1. **Users Table**
**Table Name**: `users`

**Purpose**:  
This table stores all user-related information such as usernames, email addresses, passwords, and their quiz-related data like experience points (XP) and rank. It handles user authentication and tracks overall progress in the quiz system.

**Columns**:
- `id`: Unique identifier for each user.
- `username`: The user's chosen name, used for display and identification in leaderboards.
- `email`: User's email for login and communication.
- `password`: Encrypted password for authentication.
- `xp`: Total XP earned by the user, used to calculate their rank.
- `rank`: The user's rank based on XP (e.g., Quiz Apprentice, Average Quizer, etc.).
- `timestamps`: Tracks the creation and update times for the record.

**Use**:
- User registration, authentication, and profile management.
- Tracks XP and rank progression.
- Displays in the leaderboard.

---

### 2. **Categories Table**
**Table Name**: `categories`

**Purpose**:  
This table defines the quiz categories (e.g., Art, History, Science, etc.). Each question belongs to one category, and it helps to filter questions by category during the quiz.

**Columns**:
- `id`: Unique identifier for each category.
- `name`: The category name (e.g., Art, History).

**Use**:
- Organizes quiz questions into different categories.
- Used to track users' performance in each category (correct answers per category).
- Displayed on profile pages to show category-specific stats.

---

### 3. **Questions Table**
**Table Name**: `questions`

**Purpose**:  
Stores the quiz questions along with their associated category and XP value. These questions are presented to users during the quiz.

**Columns**:
- `id`: Unique identifier for each question.
- `category_id`: Foreign key linking the question to its category.
- `text`: The actual quiz question.
- `xp_value`: XP awarded for answering the question correctly.

**Use**:
- Holds the quiz questions for each category.
- Provides the XP value for each correct answer, which contributes to the user's overall XP.
- Used in quiz generation, randomization, and scoring.

---

### 4. **Answers Table**
**Table Name**: `answers`

**Purpose**:  
This table stores all possible answers for each question, including which answer is correct. It handles the relationship between questions and their multiple-choice answers.

**Columns**:
- `id`: Unique identifier for each answer.
- `question_id`: Foreign key linking the answer to a specific question.
- `answer_text`: The actual text of the answer.
- `is_correct`: Boolean value that indicates whether this answer is correct.

**Use**:
- Used to present possible answers to users during a quiz.
- Helps validate whether a user’s selected answer is correct or incorrect.

---

### 5. **Quizzes Table**
**Table Name**: `quizzes`

**Purpose**:  
Logs each individual quiz attempt made by users. This table keeps track of the number of questions attempted and how many were answered correctly.

**Columns**:
- `id`: Unique identifier for each quiz attempt.
- `user_id`: Foreign key linking the quiz to the user who took it.
- `total_questions`: The total number of questions in the quiz.
- `correct_answers`: The number of questions answered correctly in that quiz attempt.

**Use**:
- Logs all quiz attempts made by users.
- Provides data for showing users their past quiz results.
- Helps populate the leaderboard by showing the number of correct answers a user has.

---

### 6. **Quiz Details Table**
**Table Name**: `quiz_details`

**Purpose**:  
Stores each user's answer for each question during a specific quiz attempt. It also records whether the selected answer was correct or not.

**Columns**:
- `id`: Unique identifier for each answer log.
- `quiz_id`: Foreign key linking to the specific quiz attempt.
- `question_id`: Foreign key linking to the specific question answered.
- `selected_answer_id`: Foreign key linking to the answer selected by the user.
- `is_correct`: Boolean value indicating if the user's selected answer is correct.

**Use**:
- Tracks each user's answers in a specific quiz.
- Helps display detailed quiz results to users after submission.
- Allows revisiting the quiz to see which answers were right or wrong.

---

### 7. **Category Scores Table**
**Table Name**: `category_scores`

**Purpose**:  
This table tracks how well a user has performed in each quiz category. It stores the number of correct answers and total attempts in each category.

**Columns**:
- `id`: Unique identifier for each score entry.
- `user_id`: Foreign key linking the score to the user.
- `category_id`: Foreign key linking the score to a specific category.
- `correct_answers`: The number of correct answers in the category.
- `total_questions`: The total number of questions answered in that category.

**Use**:
- Tracks user performance in each quiz category.
- Used to display stats on the user profile (e.g., percentage of correct answers per category).
- Can be used to create category-specific leaderboards or stats.

---

### 8. **Leaderboard (View)**
**Purpose**:  
Although this is not a table but a query or view based on the `users` and `quizzes` tables, the leaderboard displays the top users based on their XP.

**Columns**:
- `username`: The user’s name.
- `xp`: The user's total XP.
- `total_correct_answers`: Total correct answers across all quiz attempts.

**Use**:
- Shows the top 10 users with the highest XP on the leaderboard page.
- Provides competitive motivation by ranking users based on their XP and performance.

---

### Summary:
- **Users Table**: Stores user details and progress (XP and rank).
- **Categories Table**: Defines quiz categories.
- **Questions Table**: Contains quiz questions, linked to categories.
- **Answers Table**: Holds possible answers for questions and marks the correct answer.
- **Quizzes Table**: Logs individual quiz attempts made by users.
- **Quiz Details Table**: Records each user's answer in a quiz and whether it was correct.
- **Category Scores Table**: Tracks user performance (correct/total answers) in each category.
- **Leaderboard**: Displays top players based on XP and performance.

This documentation outlines the purpose of each table and how they are used in the quiz application.


*********************************************************************************************************************************************************************************************

## mister-quiz

### Objectives

Have you ever watched "Who Wants to Be a Millionaire?" and wonder how would you do if it was you? Well you are not going to play it this time yet. But after finishing this project, you will be able to.

You will have to continue to build a quiz game website that is already in development. The already made code is available [here](https://assets.01-edu.org/mister-quiz/mister_quiz.zip). There is missing some code that you will have to create in order to fullfil all the requests explained in the `Instructions` section.

The project is written in [PHP](https://www.php.net/) and it is using [Laravel](https://laravel.com/), one of the most (if not the most) known PHP web framework. So you have to install both PHP and Laravel on your machine (you can use which [method](https://laravel.com/docs/8.x/installation#getting-started-on-linux) you like the best). Get comfortable using dollar signs.

### Instructions

Firstly, users should be able to register and login. To register a user has to enter a username, an email, a password and a password confirmation. To login the user has to provide the email and the password. If the login credentials are not correct, an error message should appear.

In the Login page, it must be possible to navigate to the Registration page, and vice versa.

The user must have in its attributes the amount of XP, determined by the number of questions he or she answered right. Also the score for each category of questions should be stored in the format `x/y` where `x` are the correct answers and `y` are the total questions.

After logging in the user should be redirected to the homepage. The homepage should have at least three buttons present, four if they are
logged in:

- The Login button / Profile button => if the user is not logged in, the login button should be visible, otherwise the profile button must be visible.
- The Leaderboard button => shows a list of the best players.
- The Start Quiz button => button that when pressed starts a quiz.
- The Logout button => Is only shown if the user is logged in.

#### Quiz

When clicking the `Start Quiz` button on the homepage, if the user is not logged in, the user should be redirected to the Login page (instead of starting the quiz). In case the user is already logged in, the website must present the questions and the available answers for each question. The player can then choose an answer to each question and at the bottom of all the questions submit the quiz and get his results.

A question has:

- the question text
- a category. The available categories must be:
  - Art
  - History
  - Geography
  - Science
  - Sports
- XP

There are some conditions that you should have in account:

- After starting the quiz, if the user refreshes the page the same questions should pop up.
  - The same must happen if the user goes back to the homepage and start the quiz again.
- All questions should have been answered before being able to submit the quiz.
- At least one question of each category is required.

After submitting the quiz, the user should be presented to a `Results` page. This page must show:

- How many questions the user answered right and the number of total questions made
- How many questions the user answered right in each category

If a user gets a correct answer to a question, his XP is increased by the XP of the question he answered right. Also the score that the user has for the category of that question should be updated.

#### Profile

When the user visits his profile the following must be visible:

- his username
- his email
- his XP
- his rank (dependent on the amount of XP):
  - < 1500 XP => Quiz Aprentice
  - 1500 XP - 5000 XP => Average Quizer
  - 5000 XP - 10000 XP => Epic Quizer
  - \>= 10000 XP => Quiz Master
- the percentage of correct answers for each category
- number of correct answers for each category
- number of total questions answered for each category

Only the user should be able to see his own profile.

#### Leaderboard

The leaderboard page should display a table containing the top 10 players organized by XP amount. Each row of the table must have:

- username
- XP amount
- total correct answers

#### Laravel

If you already opened the project zip file provided, you might have been surprised with the amount of files and folders inside it. We know, it can be overwhelmeing.

Here are the main folders and files you will mess around with:

- `app/`
  - `Http/Controllers/` -> is the folder of every Controller in Laravel. A Controller is what controls the backend for a specific route.
  - `Models/` -> refers to the models/ classes that are used in the app.
- `database/migrations/` -> here are located the migrations that refer to the database.
- `public/` -> is the folder that applies CSS, JS, images, etc. to the website.
- `resources/views/` -> refers to the folder containing every view for the different pages of the website. You will notice that the files inside it have the extension `.blade.php`. This extension is used by Laravel to write HTML together with PHP. You can learn more about [Blade Templates](https://laravel.com/docs/5.1/blade) in the web.
- `routes/web.php` -> is the file responsible for the routes in the website.

Of course there are a lot more folders and files available that can help you achieve the idea that you have in mind for the website, but it is up to you to research them.

You can take advantage of the templates and design provided in the resource zip file provided, or you can choose to implement your own design ideas, as long as the project requirements are respected.

You may use some commands to, for example, create controllers, create migrations, apply migrations, etc. The options are endless. You will notice that in the root directory of the project there is a file `artisan`. Try running `php artisan` on the root folder of a Laravel project and you will see every command available for you.

#### Database

In order to apply the migrations in the `database/migrations/` directory, you will need to create a database. Shocker.

One of the ways to accomplish that is to work with [`XAMPP`](https://www.apachefriends.org/index.html). XAMPP is the most popular PHP development environment and unites useful tools in order to make web development easier. It pretty much uses Apache2 (an http web server host), MySQL (a database management service) and phpMyAdmin (a web MySQL administration app).

Once you have XAMPP and these three tools up and running, you can head over to [`localhost/phpmyadmin`](http://localhost/phpmyadmin/) and create a new database called mister_quiz. After that you apply the migrations and you are good to go on your quiz quest.

> [Here](https://assets.01-edu.org/mister-quiz/questions_and_answers.sql) is a sql file in which you can run in phpMyAdmin in order to have some data (questions and answers) for you to work with. You can also come up with your own questions and answers.

When first trying to run the project you will notice that you can in fact run it and go to the web page, but you will not be able to do much more. This is where you come in and save the day (or week depending on how much time you will take to solve this project).
