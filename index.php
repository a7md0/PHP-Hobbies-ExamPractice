<html>

<head>
	<title>Exam Practice</title>
	<style>
		body {
			color: #d2d636;
		}

		.submit {
			background: #62af5e;
			color: white;
			padding: 10px 20px;
			border: none;
		}

		.reset {
			background: #d9544f;
			color: white;
			padding: 10px 20px;
			border: none;
		}
	</style>
</head>

<body>
    <table width="400px" cellpadding="10" cellspacing="0">
        <form method="POST">
            <tr bgcolor="#de8704">
                <td colspan="2">My Hobbies</td>
            </tr>
            <tr bgcolor="#222536" rowspan="5">
                <td align="right">First Name</td>
                <td><input type="text" placeholder="Enter First Name" name="first_name" required /></td>
            </tr>
            <tr bgcolor="#222536">
                <td align="right">Last Name</td>
                <td><input type="text" placeholder="Enter Last Name" name="last_name" required /></td>
            </tr>
            <tr bgcolor="#222536">
                <td align="right">Password</td>
                <td><input type="password" name="password" required /></td>
            </tr>
            <tr bgcolor="#222536">
                <td align="right">Date of Birth</td>
                <td>
                    <input type="date" id="start" name="date_of_birth" required />
                </td>
            </tr>
            <tr bgcolor="#222536">
                <td align="right">Gender</td>
                <td><input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                </td>
            </tr>
            <tr bgcolor="#222536">
                <td align="right">Country</td>
                <td>
                    <select name="country">
                        <option>Country</option>
                        <option value="india">India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                        <option value="japan">Japan</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#222536">
                <td align="right">Select Game</td>
                <td>
                    <input type="checkbox" name="favorite_games[]" value="hockey" />Hockey <br />
                    <input type="checkbox" name="favorite_games[]" value="football" />Football<br />
                    <input type="checkbox" name="favorite_games[]" value="badminton" />Badminton<br />
                    <input type="checkbox" name="favorite_games[]" value="cricket" />Cricket<br />
                    <input type="checkbox" name="favorite_games[]" value="volleyball" />volleyball
                </td>
            </tr>

            <tr bgcolor="#222536">
                <td align="right">E-mail</td>
                <td><input type="email" placeholder="Enter E-mail" name="email" required /></td>
            </tr>
            <tr bgcolor="#222536">
                <td align="right">Phone</td>
                <td><input type="number" placeholder="Enter Phone" name="phone" required /></td>
            </tr>


            <tr bgcolor="#222536">
                <td> Favourite Picture </td>
                <td>
                    <input type="file" name="favorite_picture" required />

            </tr>
            <tr bgcolor="#de8704">
                <td colspan="2" align="right">
                    <input type="submit" class="submit">
                    <input type="reset" value="Cancel" class="reset">
                </td>
            </tr>
        </form>
    </table>
</body>

</html>