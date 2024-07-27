function confirmLogout() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out of your account!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'LogOut'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform the logout operation here, e.g., redirect to logout page
            window.location.href = "../../../../php/logout/logout.php"; // Change this to your logout URL
        }
    });
}