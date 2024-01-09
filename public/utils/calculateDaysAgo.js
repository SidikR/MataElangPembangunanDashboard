function calculateDaysAgo(givenDate, targetElementId) {
    const momentDate = moment(givenDate);
    const currentDate = moment();
    const daysAgo = currentDate.diff(momentDate, "days");

    let outputText = "";

    if (daysAgo === 0) {
        const hoursAgo = currentDate.diff(momentDate, "hours");
        if (hoursAgo === 0) {
            const minutesAgo = currentDate.diff(momentDate, "minutes");
            outputText = `${minutesAgo} menit yang lalu`;
        } else {
            outputText = `${hoursAgo} jam yang lalu`;
        }
    } else if (daysAgo > 365) {
        const yearsAgo = Math.floor(daysAgo / 365);
        const remainingDays = daysAgo % 365;
        outputText = `${momentDate.format(
            "DD MMMM YYYY"
        )} ${yearsAgo} tahun ${remainingDays} hari yang lalu`;
    } else {
        outputText = `${momentDate.format(
            "DD MMMM YYYY"
        )} (${daysAgo} hari yang lalu)`;
    }

    document.getElementById(targetElementId).innerHTML = outputText;
}
