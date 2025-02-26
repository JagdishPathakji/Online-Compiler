<?php
    // Default language
    $selectedLanguage = isset($_POST['language']) ? $_POST['language'] : 'cpp';
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neon Editor</title>
    <link rel="stylesheet" href="editor.css">
    <link rel="icon" href="https://bcassetcdn.com/public/blog/wp-content/uploads/2022/05/26151632/futuristic-logos-5-%E2%80%94-apple-app-store-by-mihai-dolganiuc.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/mode/clike/clike.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/mode/python/python.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/theme/dracula.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/addon/edit/closebrackets.js"></script>
</head>
<body>

    <?php
        require("nav.php");
    ?>

    <div class="editor-container">
        <!-- Language Selection -->
        <form action="execute.php" method="POST">
            <div>
            <label for="language">Select Language:</label>
            <select name="language" id="language">
                <option value="cpp" <?php if($selectedLanguage == 'cpp') echo 'selected'; ?>>C++</option>
                <option value="c" <?php if($selectedLanguage == 'c') echo 'selected'; ?>>C</option>
                <option value="python" <?php if($selectedLanguage == 'python') echo 'selected'; ?>>Python</option>
            </select>
            </div>

            <div>
                <!-- Code Editor -->
                <textarea id="editor" name="code" placeholder="Your Code here... "></textarea>
            </div> 
                
            <div>
                <label for="input">Enter Input:</label>
                <textarea id="input" name="input" placeholder="Provide required Inputs here... "></textarea>
            </div>

                <!-- Run Button -->
            <div>
                <button class="run-btn" type="submit" name="submit">Run Code</button>
            </div>
        </form>
        <div class="output-container" id="output-box">
            <pre id="output-content">Output will appear here...</pre>
        </div>
    </div>

    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
            lineNumbers: true,
            mode: "text/x-c++src", // Set default language
            theme: "dracula",  // Apply Neon Theme
            matchBrackets: true, // Highlights matching brackets
            autoCloseBrackets: true, // Auto-close brackets
            extraKeys: {
                "Ctrl-Space": "autocomplete" // Optional: Enable autocomplete
            }
        });



        // Change mode dynamically based on selected language
        document.getElementById("language").addEventListener("change", function() {
            var modeMap = {
                "cpp": "text/x-c++src",
                "c": "text/x-csrc",
                "python": "text/x-python",
            };
            editor.setOption("mode", modeMap[this.value]);
        });

        setTimeout(() => {
            editor.refresh();
        }, 100);

        editor.setCursor({ line: 0, ch: 0 });

        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent page reload

            var formData = new FormData(this);

            fetch("execute.php", {
                method: "POST", 
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById("output-box").innerHTML = data; // Update output
            });
        });
    

    </script>

</body>
</html>
