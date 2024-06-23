<?php
include "login.php";
function select($url, $block="qazwsx")
{
    $conn = connect();
    $sqlImage = "select URL, title, name, address
                 from page join block using(id_page)
                 join fill using(id_block)
                 join image using(id_image)
                 where URL=\"" . $url . "\"";

    if ($block != "qazwsx") {
        $sqlImage .= "and name=\"" . $block . "\" ";
    }

    $sqlTitle = "select URL, page.title as pt, name, title.title as tt
                 from page join block using(id_page)
                 join fill using(id_block)
                 join title using(id_title)
                 where URL=\"" . $url . "\"";

    if ($block != "qazwsx") {
        $sqlTitle .= "and name=\"" . $block . "\" ";
    }

    $rowImage = mysqli_fetch_all(mysqli_query($conn, $sqlImage), MYSQLI_ASSOC);
    $rowTitle = mysqli_fetch_all(mysqli_query($conn, $sqlTitle), MYSQLI_ASSOC);
    mysqli_close($conn);
    return [$rowImage, $rowTitle];
}

function selectText($title)
{
    $conn = connect();
    $sqlText = "select text
                from text
                join title using(id_text)
                where title='" . $title . "' ";

    $row = mysqli_fetch_array(mysqli_query($conn, $sqlText));
    mysqli_close($conn);
    return $row;
}

function selectLink($title)
{
    $conn = connect();
    $sql = "select URL
            from page
            where title=\"" . $title . "\"";

    $row = mysqli_fetch_array(mysqli_query($conn, $sql));
    mysqli_close($conn);
    return $row;
}

function selectTitle($title, $url)
{
    $conn = connect();
    $sql = "select *
            from page join block using(id_page)
            join fill using(id_block)
            join title using(id_title)
            where URL=\"" . $url . "\" and title.title=\"" . $title . "\"";

    $row = mysqli_fetch_array(mysqli_query($conn, $sql));
    mysqli_close($conn);
    return $row[0];
}

function selectUser($login, $pass="qazwsx")
{
     $conn = connect();
    $sql = "select login, type
            from user join type_user using(id_type_user)
            where login=\"" . $login . "\"";

    if($pass!="qazwsx") {
     $sql .=  "and password=\"" . $pass . "\"";
    }

    $row = mysqli_fetch_array(mysqli_query($conn, $sql));
    mysqli_close($conn);
    return $row;
}

function intoUser($login, $pass, $type)
{
    $conn = connect();
    $sql = "INSERT INTO `user` (`login`, `password`, `id_type_user`) VALUES ('".$login."', '".$pass."', '".$type."');";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    return "Пользователь " .$login . " успешно добавлен. ";
}

function DelUser($login)
{
    $conn = connect();
    $sql = "DELETE FROM `user` WHERE (`login` = '" .$login. "');";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    return "Пользователь " . $login . " успешно удален. ";
}

function AddRecord($addr, $block, $head, $text="qazwsx", $img="qazwsx")
{
    $conn = connect();
    if ($img != "qazwsx") {
        $sql = "insert into image (`address`) values ('" . $img . "');";
        mysqli_query($conn, $sql);
    }

    if ($text != "qazwsx") {
        $sql = "insert into text (`text`) values ('" . $text . "');";
        mysqli_query($conn, $sql);
        $sql = "set @te = (select id_text
                from text
                where text = '" . $text . "'
                order by id_text desc
                limit 1);";
        mysqli_query($conn, $sql);

        $sql = "insert into title (`title`, `id_text`) values ('" . $head . "', @te);";
        mysqli_query($conn, $sql);

    } else{
        $sql = "insert into title (`title`) values ('" . $head . "');";
        mysqli_query($conn, $sql);
    }

    if ($img != "qazwsx") {
        $sql = "insert into fill (`id_block`,`id_image`,`id_title`) values (
                (select id_block
                from block join page using(id_page)
                where URL = \"?id=" . $addr . "\" and name = \"" . $block . "\"),
                (select id_image from image
                where address = \"" . $img . "\"
                order by id_image desc
                limit 1) ,
                (select id_title from title
                 where title = \"" . $head . "\"));";
        mysqli_query($conn, $sql);

    }else {
        $sql = "insert into fill (`id_block`,`id_title`) values (
                (select id_block
                from block join page using(id_page)
                where URL = \"?id=" . $addr . "\" and name = \"" . $block . "\"),
                (select id_title from title
                where title = \"" . $head . "\"));";
        mysqli_query($conn, $sql);
    }

    mysqli_close($conn);
    return "Запись добавлена. ";
}

function AddRecordLink($head, $name, $link)
{
    $conn = connect();
    $sql = "set @rez = (select CONCAT(\"?id=". $link."&order=-\", SUBSTRING(URL, LOCATE(\"-\",SUBSTRING(URL, 18))+18)+1)
            from page
            where URL like '?id=". $link."&order=-%'
            order by id_page desc
            limit 1);";
    mysqli_query($conn, $sql);

    $sql = "select @rez;";
    $row = mysqli_fetch_array(mysqli_query($conn, $sql));

    if (!empty($row[0])) {
        $sql = "insert into page (`URL`, `title`) values(@rez, \"" . $head . "\");";
        mysqli_query($conn, $sql);
        $sql = "insert into block (`name`, `id_page`) values(\"" . $name . "\", (select id_page
                from page where URL=@rez ));";
        mysqli_query($conn, $sql);

    } else {
        $sql = "insert into page (`URL`, `title`) values('?id=". $link."&order=-1', \"" . $head . "\");";
        mysqli_query($conn, $sql);

        $sql = "insert into block (`name`, `id_page`) values(\"" . $name . "\", (select id_page
                from page where URL='?id=". $link."&order=-1' ));";
        mysqli_query($conn, $sql);
    }

    $sql = "SET @rez = (select id_image
            from fill join title using(id_title)
            where title = \"" . $head . "\")";
    mysqli_query($conn, $sql);

    $sql = "insert into `fill` (`id_block`,`id_image`,`id_title`) values (
            (select id_block
            from block join page using(id_page)
            where title = \"".$head."\"),
            @rez,
            (select id_title from title
            where title = \"".$head."\"))";
    mysqli_query($conn, $sql);

    $sql = "insert into `text` (`text`) values ('Примерный текст')";
    mysqli_query($conn, $sql);

    $sql = "SET @rez = (select id_title from title where title = \"".$head."\")";
    mysqli_query($conn, $sql);

    $sql = "UPDATE `title` SET `id_text` =  (select id_text
            from text
            order by id_text desc
            limit 1)
            WHERE (`id_title` = @rez)";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
    return "Успешно создана ссылка. ";
}

function DelRecord($head)
{
    $conn = connect();
    $sql = "select count(id_image)
            from fill join title using(id_title)
            where title = \"" . $head . "\"";

   $rez = mysqli_fetch_array(mysqli_query($conn, $sql));

   if($rez[0]=="2"){
        $sql = "set @fi = (select id_fill
                from fill join title using(id_title)
                where title = \"" . $head . "\"
                order by id_fill desc
                limit 1)";
        mysqli_query($conn, $sql);

        $sql = "DELETE FROM `fill` WHERE (`id_fill` = @fi)";
        mysqli_query($conn, $sql);

        $sql = "set @bl = (select id_block
                from block join page using(id_page)
                where title = \"" . $head . "\")";
        mysqli_query($conn, $sql);

        $sql = "set @pa = (select id_page
                from page
                where title = \"" . $head . "\")";
        mysqli_query($conn, $sql);

        $sql = "DELETE FROM `block` WHERE (`id_block` = @bl)";
        mysqli_query($conn, $sql);

        $sql = "DELETE FROM `page` WHERE (`id_page` = @pa)";
        mysqli_query($conn, $sql);
   }

   $sql = "set @im = (select id_image
           from fill join title using(id_title)
           where title = \"".$head."\")";
   mysqli_query($conn, $sql);

   $sql = "set @fi = (select id_fill
           from fill join title using(id_title)
           where title = \"".$head."\")";
   mysqli_query($conn, $sql);

   $sql = "DELETE FROM `fill` WHERE (`id_fill` = @fi)";
   mysqli_query($conn, $sql);

   $sql = "DELETE FROM `image` WHERE (`id_image` = @im)";
   mysqli_query($conn, $sql);
   
   $sql = "set @tex = (select id_text from title where title = \"".$head."\")";
   mysqli_query($conn, $sql);
   
   $sql = "set @t = (select id_title from title where title = \"".$head."\")";
   mysqli_query($conn, $sql);
   
   $sql = "DELETE FROM `title` WHERE (`id_title` = @t)";
   mysqli_query($conn, $sql);
   
   $sql = "DELETE FROM `text` WHERE (`id_text` = @tex)";
   mysqli_query($conn, $sql);

    mysqli_close($conn);
    return "Запись успешно удалена. ";
}

function UPRecordT($head1, $head2)
{
    $conn = connect();
    $sql = "set @t = (select id_title from title where title = '".$head1."');";
    mysqli_query($conn, $sql);

    $sql = "UPDATE `title` SET `title` = '". $head2."' WHERE (`id_title` = @t);";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
    return "Запись успешно обновлена. ";
}

function UPRecordTLinck($head1, $head2)
{
    $conn = connect();
    $sql = "set @t = (select id_page from page where title = '" . $head1 . "');";
    mysqli_query($conn, $sql);

    $sql = "UPDATE `page` SET `title` = '" . $head2 . "' WHERE (`id_page` = @t);";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
    return "Запись успешно обновлена. ";
}

function UPRecordI($head1, $image)
{
    $conn = connect();
    $sql = "set @t = (select id_image from image join fill using(id_image) join title using(id_title) where title = '" . $head1 . "');";
    mysqli_query($conn, $sql);

    $sql = "UPDATE `image` SET `address` = '" . $image . "' WHERE (`id_image` = @t);";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
    return "Запись успешно обновлена. ";
}

function UPRecordText($head1, $text)
{
    $conn = connect();
    $sql = "set @t = (select id_text from title where title = '" . $head1 . "');";
    mysqli_query($conn, $sql);

    $sql = "UPDATE `text` SET `text` = '" . $text . "' WHERE (`id_text` = @t);";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
    return "Запись успешно обновлена. ";
}