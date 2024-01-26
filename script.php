<?php
// script.php

// 从前端获取数据
$data = json_decode(file_get_contents('php://input'), true);
$userInput = $data['userInput'];

// 设置OpenAI API的请求参数
$postData = json_encode(array(
    "model" => "gpt-3.5-turbo",
    "messages" => array(array("role" => "user", "content" => $userInput)),
    "max_tokens" => 150
));

// 初始化cURL会话
$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . 'sk-VraSRaAXOSa3q6jsX2MBoxa3Wf5UAmYGf1kp3yxFi4fxvsRL' // 将密钥放在服务器端脚本中
));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

// 执行cURL请求，获取响应，并关闭会话
$response = curl_exec($ch);
curl_close($ch);

// 将OpenAI的响应发送回前端
echo $response;
/* Chat form styling */
#chat-form {
    max-width: 600px;
    margin: 50px auto;
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    display: flex;
    gap: 10px;
    }
    
    /* Style for the input field */
    #user-input {
    flex-grow: 1;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
    }
    
    /* Removes the default form focus outline */
    #user-input:focus {
    outline: none;
    border-color: #007bff;
    }
    
    /* Style for the send button */
    button[type="submit"] {
    padding: 10px 20px;
    background-image: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
    border: none;
    border-radius: 4px;
    color: white;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease;
    }
    
    button[type="submit"]:hover {
    background-image: linear-gradient(to right, #2575fc 0%, #6a11cb 100%);
    }
    
    /* Chat output styling with 3D effect */
    #chat-output {
    max-width: 600px;
    margin: 40px auto 20px; /* add spacing above and below the chat */
    padding: 20px;
    background: #f0f0f0; /* a light grey background for chat output */
    border: 1px solid #ccc; /* a solid grey border */
    border-radius: 10px; /* rounded corners */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1), /* a soft shadow for depth */
                0 0 0 1px rgba(0, 0, 0, 0.05); /* a thin border shadow for a crisp edge */
    height: 400px; /* fixed height with scroll */
    overflow-y: auto; /* only vertical scroll */
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; /* font styling */
    position: relative; /* for pseudo-element positioning */
    background: linear-gradient(145deg, #e6e6e6, #ffffff); /* subtle 3D gradient */
    }
    
    /* Style for each message in chat output */
    #chat-output > div {
    margin-bottom: 10px; /* spacing between messages */
    padding: 10px;
    background: #fff; /* white background for messages */
    border-radius: 5px; /* slightly rounded corners for messages */
    border-left: 5px solid #007bff; /* blue left border for distinction */
    font-size: 16px; /* font size for readability */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); /* soft shadow for the messages */
    }
    
    /* Add a "page" effect to the bottom of the chat output */
    #chat-output:before {
    content: '';
    position: absolute;
    z-index: -1;
    bottom: 10px;
    right: 10px;
    width: 80%;
    height: 20px;
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(0, 0, 0, 0.05));
    border-radius: 50%;
    }
    
    /* Scrollbar styling for chat output */
    #chat-output::-webkit-scrollbar {
    width: 8px; /* scrollbar width */
    }
    
    #chat-output::-webkit-scrollbar-track {
    background: #f1f1f1; /* track color */
    }
    
    #chat-output::-webkit-scrollbar-thumb {
    background: #ddd; /* thumb color */
    border-radius: 10px; /* rounded corners for the scrollbar thumb */
    }
    
    #chat-output::-webkit-scrollbar-thumb:hover {
    background: #ccc; /* thumb color on hover */
    }
    
    /* Responsive adjustments for smaller screens */
    @media (max-width: 640px) {
    #chat-output {
        max-width: 100%;
        margin: 20px auto; /* adjust the spacing on smaller screens */
    }
    }
    
    
    /* Placeholder color styling */
    #user-input::placeholder {
    color: #aaa;
    }
    
    /* Ensure the form elements align properly */
    #chat-form * {
    vertical-align: middle;
    }
    
    /* Responsive design adjustments */
    @media (max-width: 640px) {
    #chat-form {
        flex-direction: column;
    }
    
    button[type="submit"] {
        width: 100%;
        margin-top: 10px;
    }
    }
    #loading-indicator {
    display: block;
    text-align: center;
    margin: 20px;
    font-size: 24px;
    }