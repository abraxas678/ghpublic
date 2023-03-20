<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Contents Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
        }
        .file-box {
            border: 1px solid #ccc;
            padding: 10px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            aspect-ratio: 1 / 1;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .file-box.expanded {
            z-index: 1000;
            position: fixed;
            left: 10%;
            top: 10%;
            width: 80%;
            height: 80%;
            background-color: white;
        }
        .file-name {
            font-weight: bold;
            color: #3f51b5;
            margin-bottom: 5px;
        }
        .file-content {
            white-space: pre-wrap;
            font-size: 0.9em;
            color: #333;
        }
    </style>
    <script>
        function toggleExpand(element) {
            element.classList.toggle('expanded');
        }
    </script>
</head>
<body>
    <div class="grid-container">
        <?php
        $files = array_diff(scandir('.'), array('..', '.', 'file_contents_viewer.php'));
        foreach ($files as $file) {
            if (is_file($file)) {
                echo '<div class="file-box" onclick="toggleExpand(this)">';
                echo '<div class="file-name">' . htmlspecialchars($file) . '</div>';
                echo '<div class="file-content">' . htmlspecialchars(file_get_contents($file)) . '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>

