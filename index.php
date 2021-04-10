<?php

require_once('hobby.model.php');
require_once('upload.class.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();

    // Inputs
    $firstName = @$_POST['first_name'];
    $lastName = @$_POST['last_name'];
    $password = @$_POST['password'];
    $dob = @$_POST['date_of_birth'];
    $gender = @$_POST['gender'];
    $country = @$_POST['country'];
    $favoriteGames = @$_POST['favorite_games']; // array
    $email = @$_POST['email'];
    $phone = @$_POST['phone'];
    $favoritePicture = @$_FILES['favorite_picture'];

    if (
        !isset($firstName) || empty($firstName) ||
        !isset($lastName) || empty($lastName) ||
        !isset($password) || empty($password) ||
        !isset($dob) || empty($dob) ||
        !isset($gender) || empty($gender) ||
        !isset($country) || empty($country) ||
        !isset($favoriteGames) || empty($favoriteGames) ||
        !isset($email) || empty($email) ||
        !isset($phone) || empty($phone) ||
        empty($favoritePicture)
    ) { // •	Empty values not allowed, 
        $errors[] = "All fields should be present.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // •	Correct format for Email. 
        $errors[] = "Invalid email address";
    }

    if (!is_numeric($phone)) { // •	Only Numeric for Phone Number, 
        $errors[] = "Only Numeric for Phone Number";
    }

    if (!is_array($favoriteGames) || count($favoriteGames) < 1) { // •	At least 1 selection for Game, 
        $errors[] = "You have to select at least one game";
    }

    if (count($errors) == 0) {
        $upload = new Upload();
        $upload->setUploadDir('images/');
        $uploadErrors = $upload->upload('favorite_picture');

        if ($uploadErrors == null || count($uploadErrors) == 0) {
            $imagePath = $upload->getUploadDir() . $upload->getFilepath();

            $hobby = new Hobby(
                $firstName,
                $lastName,
                $dob,
                $gender,
                $favoriteGames,
                $email,
                $phone,
                $password,
                $imagePath
            );
            $hobby->add(); // insert to db
        } else {
            $errors = array_merge($errors, $uploadErrors);
        }
    }
}

?>

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
        <?php
            if (count($errors) > 0) {
                echo "<ul>";
                foreach ($errors as $error) {
                    echo "<li>".$error."</li>";
                }
                echo "<ul>";
            }
        ?>
        <form method="POST" enctype="multipart/form-data">
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
                <td><input type="radio" name="gender" value="male" required />Male
                    <input type="radio" name="gender" value="female" required />Female
                </td>
            </tr>
            <tr bgcolor="#222536">
                <td align="right">Country</td>
                <td>
                    <select name="country" required>
                        <option value="">Country</option>
                        <option>India</option>
                        <option>USA</option>
                        <option>UK</option>
                        <option>Japan</option>
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

<?php
Database::getInstance()->closeConnection();
?>