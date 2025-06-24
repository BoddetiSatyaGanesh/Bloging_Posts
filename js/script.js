// Wait until DOM is ready
document.addEventListener("DOMContentLoaded", function () {
    console.log("Blog_Post JavaScript Loaded!");

    // Optional: Alert on like button click
    const likeButtons = document.querySelectorAll(".like-button");
    likeButtons.forEach(button => {
        button.addEventListener("click", function () {
            alert("You liked this post!");
        });
    });

    // Optional: Confirm before deleting a post (if added later)
    const deleteButtons = document.querySelectorAll(".delete-button");
    deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            if (!confirm("Are you sure you want to delete this post?")) {
                event.preventDefault();
            }
        });
    });
});
