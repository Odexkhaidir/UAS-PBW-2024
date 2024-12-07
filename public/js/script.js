function previewImage() {
    const sampul = document.querySelector('#sampul');
    const sampulLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    sampulLabel.textContent = sampul.files[0].name;

    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(sampul.files[0]);
    fileSampul.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const updatedAtElement = document.getElementById('updatedAt');
    const updatedAt = updatedAtElement.getAttribute('data-updated-at');
    // Call the timeDiff function to calculate the time ago text and store it in a variable
    const timeAgoText = timeDiff(new Date(updatedAt));
    // Update the text content of the updatedAt element with the time ago text
    updatedAtElement.textContent = "Updated " + timeAgoText + " ago";
});

function timeDiff(initTime) {
    const now = new Date();
    // Calculate the time difference in milliseconds
    const interval = now.getTime() - initTime.getTime();

    // Calculate the time difference in seconds, minutes, hours, days, months, and years
    const seconds = Math.floor(interval / 1000);
    const minutes = Math.floor(seconds / 60);
    const hours = Math.floor(minutes / 60);
    const days = Math.floor(hours / 24);
    const months = Math.floor(days / 30);
    const years = Math.floor(months / 12);

    // Determine the appropriate time ago text based on the time difference
    if (years > 0) {
        return `${years} year${years > 1 ? 's' : ''}`;
    } else if (months > 0) {
        return `${months} month${months > 1 ? 's' : ''}`;
    } else if (days > 0) {
        return `${days} day${days > 1 ? 's' : ''}`;
    } else if (hours > 0) {
        return `${hours} hour${hours > 1 ? 's' : ''}`;
    } else if (minutes > 0) {
        return `${minutes} minute${minutes > 1 ? 's' : ''}`;
    } else {
        return `${seconds} second${seconds > 1 ? 's' : ''}`;
    }
}

document.addEventListener('keydown', function(event) {
    if (event.altKey && event.key === 'n') {
        event.preventDefault(); // Prevent default browser action for Alt+F

        const offcanvasNavbar = new bootstrap.Offcanvas(document.getElementById('offcanvasNavbar'));

        if (!document.getElementById('offcanvasNavbar').classList.contains('show')) {
            offcanvasNavbar.show();
        } else {
            offcanvasNavbar.hide();
        }
    }
});