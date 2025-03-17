<script>
$(document).ready(function ()
{
    $('#ajax-get').on('click', function () 
    {
        $.ajax(
        {
            url: 'index.php', 
            type: "GET",
            data: 
            {
                 action: "getProjects" 
            }, 
            dataType: "json",
            success: function (data) 
            {
                console.log(data); 
                $('#projects-container').empty();

                $.each(data, function (index, value) 
                {
                    $('#projects-container').append(`
                        <div>${value['name']}</div>
                    `);
                });
            },
            error: function (xhr, status, error) 
            {
                console.error("Error fetching data:", error);
            }
        });
    })
})
</script>
