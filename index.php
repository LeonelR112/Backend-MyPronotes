<?php
    include "./layouts/header.php"
?>
        <div class="container my-4">
            <h1 class="border-bottom border-dark">Index System</h1>

            <h2>Url base:</h2>

            <div class="code">
                https://localhost/notesapp/api
            </div>
            
            <br>
            <span class="badge bg-warning">Atention!</span> It is necessary to send a user token to make a GET and POST request, this is to make the notes private for each user
            <h3>Response in JSON format:</h3>

        <div class="code">
            <pre>
[
    {
        <span class="key">"id"</span>: <span class="value">"0"</span>,
        <span class="key">"title"</span>: <span class="value">"Title"</span>,
        <span class="key">"content"</span>: <span class="value">"qwerty12345"</span>,
        <span class="key">"created_at"</span>: <span class="value">"1606592051"</span>,
        <span class="key">"updated_at"</span>: <span class="value">"1606592051"</span>,
        <span class="key">"user_id"</span>: <span class="value">"falkfj198f-129fhskjfh1-fjkh1iosfh91"</span>
    }
]
            </pre>
        </div>

        <br>
        <h3>Example to get all notes:</h3>

        <div class="code">
            <a href="https://localhost/notesapp/api/notes" target="_blank">https://localhost/notesapp/api/notes</a>
        </div>
        <br>
        <h3>Routes:</h3>
            <div class="code">
                <table style="width: 100%;">
                    <tr>
                        <td><b>GET:</b></td>
                        <td>/notes</td>
                        <td>Returns all notes</td>
                    </tr>
                    <tr>
                        <td><b>GET:</b></td>
                        <td>/notes/<span class="value">{id}</span></td>
                        <td>Returns an existing note by id</td>
                    </tr>
                    <tr>
                        <td><b>POST, PUT, DELETE:</b></td>
                        <td>/notes</td>
                        <td>
                            <a href="documentation" class="btn btn-outline-dark">View documentation</a>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
<?php
    include "./layouts/footer.php"
?>