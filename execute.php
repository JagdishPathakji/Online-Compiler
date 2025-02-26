<?php
if (isset($_POST['code']) && isset($_POST['language']) && isset($_POST['input'])) {
    $code = $_POST['code'];
    $language = $_POST['language'];
    $input = $_POST['input'];

    // File paths
    $codeFile = "";
    $compileCommand = "";
    $executeCommand = "";

    // Save user input to a file
    file_put_contents("input.txt", $input);

    if ($language == "cpp") {
        $codeFile = "temp.cpp";
        file_put_contents($codeFile, $code);

        // Compile C++ code
        $compileCommand = "g++ temp.cpp -o temp.exe 2>&1";
        $executeCommand = "temp.exe < input.txt"; // Run with input

    } elseif ($language == "c") {
        $codeFile = "temp.c";
        file_put_contents($codeFile, $code);

        // Compile C code
        $compileCommand = "gcc temp.c -o temp.exe 2>&1";
        $executeCommand = "temp.exe < input.txt"; // Run with input

    } elseif ($language == "python") {
        $codeFile = "temp.py";
        file_put_contents($codeFile, $code);

        // Python does not need compilation
        $compileCommand = ""; 
        $executeCommand = "python temp.py < input.txt"; // Run with input
    }

    // Compile (if required)
    if (!empty($compileCommand)) {
        $compileOutput = shell_exec($compileCommand);
        if (!empty($compileOutput)) {
            echo "<div class='output-container'><pre>Compilation Error:\n$compileOutput</pre></div>";
            exit;
        }
    }

    // Execute the program
    $output = shell_exec($executeCommand);
    $output = trim($output); // Remove extra blank lines

    echo "<div class='output-container'><pre>$output</pre></div>";
}
?>
