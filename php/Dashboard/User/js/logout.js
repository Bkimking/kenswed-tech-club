// Function to confirm logout
function confirmLogout() {
    // Display a confirmation dialog
    if (confirm("Are you sure you want to logout?")) {
        // If user clicks OK, redirect to logout script or perform logout action
        window.location.href = "../../logout/logout.php"; 
    } else {
        // If user clicks Cancel, do nothing (stay on the current page)
    }
}
