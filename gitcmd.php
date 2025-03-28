

<?php

// Set the directory of your Git repository (the root of the repo)
$git_directory = 'https://github.com/abhinav-appstechy/react_redux_base'; // Replace with the actual path to your repository

// Set the Git branch you want to push to
$branch_name = 'chnge'; // Replace with your desired branch name

// Change the working directory to your Git repository
chdir($git_directory);

// Function to execute git commands and capture output
function run_git_command($command) {
    $output = shell_exec($command);
    if ($output === null) {
        echo "Failed to execute command: {$command}\n";
    } else {
        echo "Command Output: \n{$output}\n";
    }
}

// Function to detect changes in the repository
function has_changes() {
    // Check if there are any changes in the working directory (files that are modified or untracked)
    $status = shell_exec('git status --porcelain');
    
    // If there is any output, it means there are changes
    return !empty($status);
}

// Step 1: Monitor for changes in the repository
while (true) {
    if (has_changes()) {
        echo "Changes detected! Commencing Git push...\n";

        // Stage all changes
        run_git_command("git add .");

        // Commit the changes with a message
        $commit_message = "Automated commit - " . date('Y-m-d H:i:s');
        run_git_command("git commit -m \"$commit_message\"");

        // Push the changes to the remote repository on the specified branch
        run_git_command("git push origin {$branch_name}"); // Replace 'chnge' with your branch name
    }

    // Sleep for a while (you can adjust the interval as needed)
    sleep(5); // Check every 5 seconds
}

?>

