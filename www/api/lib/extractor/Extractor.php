<?php
class Extractor
{
    public static function extractData()
    {
        //Make sure that the content type has been set to application/json
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if (strcasecmp($contentType, 'application/json') != 0) {
            throw new Exception('Content type must be: application/json');
        }

        //Receive the RAW post data.
        $content = trim(file_get_contents("php://input"));

        //Attempt to decode the incoming RAW post data from JSON.
        $decoded = json_decode($content, true);

        //If json_decode failed, the JSON is invalid.
        if (!is_array($decoded)) {
            throw new Exception('Received content contained invalid JSON!');
        }

        return $decoded;
    }
}
