<div class="enter">/user</div>
<div class="content">
    <!-- Create User -->
    <form name="input" action="create_user.php" method="get">
        Tag: <input type="text" size="12" maxlength="150" name="Tag" value="DefaultTag"/></br>
        Email: <input type="text" size="12" maxlength="150" name="Email" value="DefaultMail@unknow.com"/></br>
        FirstName: <input type="text" size="12" maxlength="150" name="FirstName" value="DefaultFirstName"/></br>
        Lastname: <input type="text" size="12" maxlength="150" name="Lastname" value="DefaultLastName"/></br>
        CanRegisterMeanOfPayment: <input type="text" size="12" maxlength="150" name="CanRegisterMeanOfPayment" value="true"/></br>
        IP: <input type="text" size="12" maxlength="150" name="IP" value="127.0.0.1"/></br>
        Birthday: <input type="text" size="12" maxlength="150" name="Birthday"/></br>
        Password: <input type="text" size="12" maxlength="150" name="Password" value="123456789azerty"/></br>
        Nationality: <input type="text" size="12" maxlength="150" name="Nationality" value="French" /></br>
        PersonType :
        <select name="PersonType">
            <option value="NATURAL_PERSON">NATURAL_PERSON</option>
            <option value="LEGAL_PERSONALITY">LEGAL_PERSONALITY</option>
        </select>
        <input type="submit" value="POST" />
    </form>
</div>