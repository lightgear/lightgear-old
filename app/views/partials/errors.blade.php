@if ($errors->any())
    <ul class="message error">
        {{ implode('', $errors->all('<li>:message</li>')) }}
    </ul>
@endif
