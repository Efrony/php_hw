<?php
function doFeedbackAction()
{
    if ($_GET['action'] == 'edit') {
        editComment();
    }
    if ($_GET['action'] == 'delete') {
        deleteComment();
    }
    if (isset($_POST['sendComment'])) {
        if ($_GET['action'] == 'edit') {
            saveComment();
        } elseif ($_GET['action'] != 'edit') {
            addComment();
        }
    }
}


function messageComment()
{
    if (isset($_GET['message'])) {
        switch ($_GET['message']) {
            case "add":
                $messageComment = 'Ваш отзыв добавлен!';
                break;
            case "edit":
                $messageComment = 'Можете изменить отзыв';
                break;
            case "delete":
                $messageComment = 'Отзыв удален!';
                break;
            case "save":
                $messageComment = 'Отзыв изменён';
                break;
            default:
                $messageComment = '';
        }
    }
    return $messageComment;
}


function addComment()
{
    $nameComment = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($_POST['nameComment'])));
    $emailComment = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($_POST['emailComment'])));
    $textComment = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($_POST['textComment'])));
    $dateComment = date('Y') . '-' . date('m') . '-' .  date('d') . ' ' . date('H') . ':' . date('i') . ':' . date('d');
    $id_product = getIdProduct();
    $sql = "INSERT INTO `comments` (`id_product`, `text`, `name`, `date`, `email`) VALUES ('{$id_product}','{$textComment}', '{$nameComment}', '{$dateComment}', '{$emailComment}');";
    executeQuery($sql);
    header("Location: ?message=add");
}

function deleteComment()
{
    $id = (int)$_GET['id'];
    executeQuery("DELETE FROM `comments` WHERE (`id` = {$id});");
    header("Location: ?message=delete");
}

function editComment()
{
    $id = (int)$_GET['id'];
    $result = executeQuery("SELECT * FROM comments WHERE id = {$id}");
    $selectedComment = mysqli_fetch_assoc($result);
    return $selectedComment;
    header("Location: ?message=edit&action=edit");
}

function saveComment()
{   
    $id = (int)$_POST['id_comment'];
    $nameComment = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($_POST['nameComment'])));
    $emailComment = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($_POST['emailComment'])));
    $textComment = mysqli_real_escape_string(getDB(), (string)htmlspecialchars(strip_tags($_POST['textComment'])));
    $dateComment = date('Y') . '-' . date('m') . '-' .  date('d') . ' ' . date('H') . ':' . date('i') . ':' . date('d');
    $sql = "UPDATE `comments` SET `text` = '{$textComment}', `name` = '{$nameComment}', `date` = '{$dateComment}', `email` = '{$emailComment}' WHERE id = {$id};";
    executeQuery($sql);
    header("Location: ?message=save");
}

