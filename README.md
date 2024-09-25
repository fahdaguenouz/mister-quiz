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