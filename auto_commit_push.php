<?php

// Set the directory of your Git repository (the root of the repo)
$git_directory = 'C:/xampp/htdocs/react_redux_base'; // Replace with the actual local path to your repository

// Set the Git branch you want to push to
$branch_name = 'chnge'; // Replace with your desired branch name

// Set the GitHub remote URL with HTTPS (optional, in case it's needed)
$remote_url = 'https://github.com/abhinav-appstechy/react_redux_base.git'; // Your GitHub repository URL

// Change the working directory to your Git repository
chdir($git_directory);

// Function to execute git commands and capture output
function run_git_command($command) {
    // Run the command and capture both stdout and stderr
    $output = shell_exec($command . ' 2>&1');
    if ($output === null) {
        echo "Failed to execute command: {$command}\n";
        echo "Error: No output returned.\n";
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

// Function to check the current branch
function get_current_branch() {
    $branch = shell_exec('git rev-parse --abbrev-ref HEAD');
    return trim($branch);
}

// Step 1: Monitor for changes in the repository
while (true) {
    if (has_changes()) {
        echo "Changes detected! Commencing Git push...\n";

        // Ensure we are on the correct branch
        $current_branch = get_current_branch();
        if ($current_branch !== $branch_name) {
            echo "Switching to branch {$branch_name}...\n";
            run_git_command("git checkout {$branch_name}");
        }

        // Stage all changes
        echo "Staging changes...\n";
        if (run_git_command("git add .")) {
            // Commit the changes with a message
            $commit_message = "Automated commit - " . date('Y-m-d H:i:s');
            if (run_git_command("git commit -m \"$commit_message\"")) {
                // Push the changes to the remote repository on the specified branch
                echo "Pushing changes to the remote repository...\n";
                run_git_command("git push origin {$branch_name}"); // Replace 'chnge' with your branch name
            }
        }
    } else {
        echo "No changes detected.\n";
    }

    // Sleep for a while (you can adjust the interval as needed)
    sleep(5); // Check every 5 seconds
}

?>
