<?php

if (isset($_POST['language'])) {
    $language = $_POST['language'];
    setcookie('lang', $language, time() + (60 * 60 * 24 * 365));
} else {
    if (isset($_COOKIE['lang'])) {
        $language = $_COOKIE['lang'];
    } else {
        $language = 'en';
    }
}
$contents = json_decode(file_get_contents("data/kea_$language.json"), true);   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>KEA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js" type="module"></script>
</head>
<body>
    <header>
        <form id="frmLanguage" action="index.php" method="POST">
            <fieldset>
                <select id="cmbLanguage" name="language">
                    <option value="en">English</option>
                    <option value="da" <?=$language === 'da' ? 'selected' : ''; ?>>Dansk</option>
                </select>
            </fieldset>
        </form>
        <h1><?=$contents['title']; ?></h1>
    </header>
    <main>
        <?=$contents['content']; ?>
    </main>
    <footer>
        <p>&copy; 2021 Arturo Mora-Rioja</p>
    </footer>
</body>
</html>