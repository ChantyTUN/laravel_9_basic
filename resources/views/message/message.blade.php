<!-- Any Error  -->
@if(count($errors))
    @foreach($errors->all() as $error)
    <blockquote class="blockquote blockquote-danger">
        <p>{{ @$error }}</p>
        <footer class="blockquote-footer">Message Error <cite title="Source Title">Please check again</cite></footer>
    </blockquote>
    @endforeach
@endif