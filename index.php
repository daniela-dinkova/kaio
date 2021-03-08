<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" contnet="with=devide-width initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootsrta/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="kontakti.css">
  <title>Kontakti</title>
</head>

<body>

  <ul class="sticky">
    <li><a href="index.html">Начало</a></li>
    <li><a href="za kai.html">За Кай</a></li>
    <li><a href="za porodata.html">За породата</a></li>
    <li><a href="blog.html">Блог</a></li>
    <li><a class="active" href="index.php">Контакти</a></li>
  </ul>

  <div class="container">

    <div class="card">
      <div class="img_container"><img src="изтеглен файл.png" alt="female" /></div>
      <form action="form.php" method="POST">
        <!-- Когато потребителят попълни формуляра и щракне върху бутона за изпращане, 
данните за формуляра се изпращат за обработка във PHP файл с име "form.php".
Данните за формуляра се изпращат с метода HTTP POST, който е подходящ за изпращане 
на поверителна информация. -->
        <input placeholder="потребителско име" type="text" name="user_name">
        <?php if(isset($name_error)) { ?>
        <!-- Функцията isset () проверява дали променливата $name_error се изпълнява -->
        <p> <?php echo $name_error ?></p> <!-- Ако е изпълнена се изкарва на екрана съдържанието на променливата -->
        <?php } ?>

        <input placeholder="парола" type="password" name="user_password"><br>
        <?php if(isset($password_error)) { ?>
        <p> <?php echo $password_error ?></p>
        <?php } ?>

        <input class="register_button" type="submit" value="регистрация">
      </form>
    </div>
  </div>
  <footer>
    <p>Автор: Даниела Динкова<br>
      <a href="mailto:daniela_dinkova@abv.bg">daniela_dinkova@abv.bg</a></p>
  </footer>


</body>

</html>