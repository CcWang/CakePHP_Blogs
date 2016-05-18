<h3>Start typing a name in the input field below:</h3>

<form action=""> 
First name: <input type="text" id="txt1" onkeyup="showHint(this.value)">
</form>

<p>Suggestions: <span id="txtHint"></span></p> 
<div class="notification-icon">
    You have <?= $art_count ?> unread messages.
</div>
