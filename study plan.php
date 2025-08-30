<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Study Planner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e1e;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            background-color: #2c2c2c;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        button {
            background-color: #5a5a5a;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4a4a4a;
        }
        .task-list {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Student Study Planner</h1>
    <form action="" method="POST">
        <input type="text" name="subject" placeholder="e.g. Mathematics" required>
        <textarea name="task" placeholder="Describe the study task..." required></textarea>
        <input type="date" name="due_date" required>
        <button type="submit">Add To Planner</button>
    </form>

    <div class="task-list">
        <h2>Your Tasks:</h2>
        <ul>
            <?php
            session_start();
            if (!isset($_SESSION['tasks'])) {
                $_SESSION['tasks'] = [];
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $subject = htmlspecialchars($_POST['subject']);
                $task = htmlspecialchars($_POST['task']);
                $due_date = htmlspecialchars($_POST['due_date']);

                // Add task to session
                $_SESSION['tasks'][] = [
                    'subject' => $subject,
                    'task' => $task,
                    'due_date' => $due_date
                ];
            }

            // Display tasks
            foreach ($_SESSION['tasks'] as $item) {
                echo "<li>{$item['subject']} - {$item['task']} (Due: {$item['due_date']})</li>";
            }
            ?>
        </ul>
    </div>
</div>

</body>
</html>
