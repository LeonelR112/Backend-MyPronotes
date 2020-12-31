<?php
    include "./layouts/header.php";
?>
        
        <div class="container my-4">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index">index</a></li>
                  <li class="breadcrumb-item active" aria-current="page">documentation</li>
                </ol>
            </nav>
            <h2>Documentation</h2>
            <hr>
            <p>To make a POST, PUT or DELETE request, it is necessary to send a json file with each defined format and one user token to identify notes saved in the database. <strong>must always submit a POST request to get a satisfactory response.</strong></p>
            <div class="code mb-3">
                https://localhost/notesapp/api/notes
            </div>

            <h3>POST request</h3>
            JSON format to POST request:
            <div class="code">
                <pre>
{
    <span class="key">"method": </span><span class="value">"post"</span>,
    <span class="key">"body" : </span> {
        <span class="key">"title"</span>: <span class="value">"Title"</span>,
        <span class="key">"content"</span>: <span class="value">"qwerty12345"</span>,
        <span class="key">"created_at"</span>: <span class="value">"1606592051"</span>,
        <span class="key">"updated_at"</span>: <span class="value">"1606592051"</span>
    }
}                    
                </pre>
            </div>

            <br>
            <h3>PUT request</h3>
            JSON format to PUT request:
            <div class="code">
                <pre>
{
    <span class="key">"method": </span><span class="value">"put"</span>,
    <span class="key">"body" : </span> {
        <span class="key">"id"</span>: <span class="value">"1"</span>,
        <span class="key">"title"</span>: <span class="value">"Example"</span>,
        <span class="key">"content"</span>: <span class="value">"qwerty12345"</span>,
        <span class="key">"updated_at"</span>: <span class="value">"1606592051"</span>
    }
}                    
                </pre>
            </div>

            <br>
            <h3>DELETE request</h3>
            JSON format to DELETE request:
            <div class="code">
                <pre>
{
    <span class="key">"method": </span><span class="value">"delete"</span>,
    <span class="key">"body" : </span> {
        <span class="key">"id"</span>: <span class="value">"1"</span>
    }
}                    
                </pre>
            </div>

        <a href="index" class="btn btn-dark my-4">Back to Index</a>
        </div>

<?php
    include "./layouts/footer.php";
?>