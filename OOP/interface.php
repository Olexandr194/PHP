<?php
interface Camera
{
    function makeVideo();
    function makePhoto();
}
interface Messenger
{
    function sendMessage($message);
}

interface Phone extends Camera, Messenger
{
    function sendMessage($message);
}

class Mobile implements Camera, Messenger
{
    function makeVideo(){ echo "Make video";}
    function makePhoto(){ echo "Make photo";}
    function sendMessage($message) {echo "Send message $message";}
}
$iphone = new Mobile();
$iphone->sendMessage('hello');



/*class Mobile2 implements Phone
{
    function makeVideo(){ echo "Make video";}
    function makePhoto(){ echo "Make photo";}
    function sendMessage($message) {echo "Send message $message";}
}*/

