$(document).ready(function () {
    // 🔁 Load projects via GET
    $('#ajax-get').on('click', function () {
        $.ajax({
            url: 'index.php',
            type: "GET",
            data: {
                action: "getProjects"
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#projects-container').empty();

                $.each(data, function (index, value) {
                    $('#projects-container').append(`
                        <div>${value['name']}</div>
                    `);
                });
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });
    });

    // 🎧 Preview audio
    const audioInput = $('#audioUpload');
    const audioPlayer = $('#audioPlayer');

    audioInput.on('change', function () {
        const file = this.files[0];
        if (file) {
            const audioURL = URL.createObjectURL(file);
            audioPlayer[0].src = audioURL;
            audioPlayer[0].load();
            audioPlayer.show();
        }
    });

    // 📤 Send audio via GET as base64
    $('#sendAudioGet').on('click', function () {
        const file = $('#audioUpload')[0].files[0];

        if (!file) {
            alert("Please choose an audio file first.");
            return;
        }

        const reader = new FileReader();

        reader.onload = function (e) {
            const base64Audio = encodeURIComponent(e.target.result);

            $.ajax({
                url: 'index.php',
                type: 'GET',
                data: {
                    action: 'sendAudio',
                    audio: base64Audio
                },
                success: function (response) {
                    console.log("Server response:", response);
                    alert("Audio sent via GET successfully!");
                },
                error: function (xhr, status, error) {
                    console.error("Error sending audio:", error);
                    alert("Failed to send audio via GET.");
                }
            });
        };

        reader.readAsDataURL(file);
    });
});
