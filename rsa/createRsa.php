<?php
/**
 * 生成待签名的字符串
 * @param $data 参与签名的参数数组
 * @return string 待签名的字符串
 */
function getSignStr($data)
{
    //排序
    ksort($data);
    //剔除sign 如果对方的签名叫sign 或者可以在调用方法的时候剔除
    //unset($data['sign']);

    $stringToBeSigned = '';

    $i = 0;

    foreach ($data as $k => $v) {
        if ($i == 0) {
            $stringToBeSigned .= "$k" . "=" . "$v";
        } else {
            $stringToBeSigned .= "&" . "$k" . "=" . "$v";
        }

        $i++;
    }

    return $stringToBeSigned;
}

/**
 * 生成签名
 * @param array $params 待签名的所有参数
 * @return string 生成的签名
 */
function getSignGenerator($params)
{
    //生成待验签的字符串
    $data = getSignStr($params);

    //私钥的内容 一行的格式
    $privateKey = 'MIIEpAIBAAKCAQEAvJ6HpYBwDSdqyzoHirAFUuWNtwwRnqN1jb4Fi2VGO39wt9nF
lOGIsYfgDKaWkY3/wQ8717H8YzAYx62kwMKDoncBTVGWU+hofgG5KkqjR13GJvzm
3mLV9bA/mMuULdIO8jmeuchOq8aRMMbINQdWEWEXJqdU/s7Sc8EIm/pHDE72i028
/G1+KWb0rvrxiGoPKaLGPVCb3+AzUYs2/de8kmvB8Pje1auxu4lS2sqkR+rgtHty
O+l+GiAzw7zkQoTh7A1KiQYYpApT9C+/z2JKu+Nrn/IO3OYKY6aU17uyrqaid0x4
W0pGs64rI/hWhv2g10Pf9TIWt9bWugcfFZsiEQIDAQABAoIBAQCm0Kn1FE+FQqwv
imXrIVvEAeNA1Xqry7MGpd0veGUR79bXstEMqB6FrD7Z0Wdu2aAstXVegTpO2tW/
m3IPTLiwsgFDyXljQjNP5eRGY/ZeArBiAN+KJO1HuhW0469sis/PKGiZtG7netkj
w1qDk7Zp7m1UMT95j58O4tTjZgj590NeDADY2ZESDfFHwiEPvzoIa/MvdWA06a63
BS6LcTuR7t9ImxBBvUFf0jbUTtTmyXatZZuPlCR5/HwJQxcFPPTBzPC1m6wcJxsq
HdvPfbrdcd2b/Pv2QWUnMS0Wc6oD9jRKbmoaacPD5Tyifzt0FKJpMB9Ezwqk+Jw7
Yz4dJTlxAoGBAN3+Iooa6d6Fqu3ty2g98aPLJWp3XuS/SQeMkCWg1+p9VsvtDWSA
VAMdPN8bxdUO7he+RdWEhlLwLYw9Om3e7OiTep96FEg94EezXtaQarYZWTw5bqPX
2HN7f81mXudKWd0gs7gTzlYGudRfz+q0dg0ikhwFeVMQ2z6oSZenhA1tAoGBANmD
l3DaaQENj2A3rUKfjJm/JW1IrGnUCQYFTE/KnZHW/TPIGQCGOrmtdpSs3Ou2YLLv
nAl++S8ISbMqKvTQIZv0YUcXY0OnwJHa2J1BBwCbOO8kQB2aBkYFIyJOXXoe3y94
ZAD1hdm+yhFzY56IxhArxty7gD/xwMeNzhyb4bS1AoGAPc3xQ832arOAQTnBNcZ5
Lgby5c9SJhFzfZyOzUsYkfpPXfsjjWWE/lD3j44l6Al+FDIvMyDwXMrtg2vQhqJY
BvB4ZUoRt4MynAO+VbJjY0tvYqsCuK7xXkV18XOc3HwAxOXD423wNlctCYmbU1bm
vwVu9Eo52vyIbctgoc5Ln4kCgYEAoeo8BE0BV0BR10z605pTHmvUn3o2pfypzuqI
uOjZzKNeDnrIacSB2JAQsnHPbkNvziNhYww6z9D6k70zBtQcAKy08Seuw8EPL0Pa
dYzfeosRoaq5c4+hVeQjGDl/ihWLDBoxTyl1PvawErdzk6K61XTQ7qVAvdjnKWUc
5dz/8fUCgYBTHpwJWxl922u366Nvya5SZyJvVteW2c9NAt4IcFq3sSDy87BuO/ME
Tg5MGuVqzOvmEeFP8pWA3Rhsl7AbuhXtor9Pwcfz3pndRwudgW6MGJSK6Xnxkhrf
hOhzxLZtqJA6TgsUT0llnWbsvB2TX5Wmtqr95rjjhrX4n4H66oEJEw==';

    $pem = "-----BEGIN RSA PRIVATE KEY-----\n" .
        wordwrap($privateKey, 64, "\n", true) .
        "\n-----END RSA PRIVATE KEY-----";

    //openssl_private_encrypt($data, $crypted, $pem);
    openssl_sign($data, $sign, $pem, OPENSSL_ALGO_SHA256);

    $sign = base64_encode($sign);

    return $sign;
}

/**
 * 验证签名
 * @param array $params 待签名的所有参数
 * @param string $sign 生成的签名
 * @return boolean 校验的结果
 */
function signCheck($params, $sign)
{
    //生成待验签的字符串
    $data = getSignStr($params);
    //对方的公钥内容 一行的形式
    $publicKey = 'xxx';

    $pem = "-----BEGIN PUBLIC KEY-----\n" .
        wordwrap($publicKey, 64, "\n", true) .
        "\n-----END PUBLIC KEY-----";

    $checkResult = (bool)openssl_verify($data, base64_decode($sign), $pem, OPENSSL_ALGO_SHA256);

    return $checkResult;
}

/**
 * 我们自己的加密
 * @param $str 待加密的字段
 * @return string
 */
function encrypt($string)
{
    //公钥内容 一行的形式
    $pubKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvJ6HpYBwDSdqyzoHirAFUuWNtwwRnqN1jb4Fi2VGO39wt9nFlOGIsYfgDKaWkY3/wQ8717H8YzAYx62kwMKDoncBTVGWU+hofgG5KkqjR13GJvzm3mLV9bA/mMuULdIO8jmeuchOq8aRMMbINQdWEWEXJqdU/s7Sc8EIm/pHDE72i028/G1+KWb0rvrxiGoPKaLGPVCb3+AzUYs2/de8kmvB8Pje1auxu4lS2sqkR+rgtHtyO+l+GiAzw7zkQoTh7A1KiQYYpApT9C+/z2JKu+Nrn/IO3OYKY6aU17uyrqaid0x4W0pGs64rI/hWhv2g10Pf9TIWt9bWugcfFZsiEQIDAQAB';

    $res = "-----BEGIN PUBLIC KEY-----\n" .
        wordwrap($pubKey, 64, "\n", true) .
        "\n-----END PUBLIC KEY-----";

    openssl_public_encrypt($string, $encrypt, $res);

    return base64_encode($encrypt);
}

/**
 * 我们自己的解密
 * @param $secret 加密后的base64字段
 * @return string
 */
function decrypt($secret)
{
    //私钥内容 一行的形式
    $privateKey = 'MIIEpAIBAAKCAQEAvJ6HpYBwDSdqyzoHirAFUuWNtwwRnqN1jb4Fi2VGO39wt9nFlOGIsYfgDKaWkY3/wQ8717H8YzAYx62kwMKDoncBTVGWU+hofgG5KkqjR13GJvzm3mLV9bA/mMuULdIO8jmeuchOq8aRMMbINQdWEWEXJqdU/s7Sc8EIm/pHDE72i028/G1+KWb0rvrxiGoPKaLGPVCb3+AzUYs2/de8kmvB8Pje1auxu4lS2sqkR+rgtHtyO+l+GiAzw7zkQoTh7A1KiQYYpApT9C+/z2JKu+Nrn/IO3OYKY6aU17uyrqaid0x4W0pGs64rI/hWhv2g10Pf9TIWt9bWugcfFZsiEQIDAQABAoIBAQCm0Kn1FE+FQqwvimXrIVvEAeNA1Xqry7MGpd0veGUR79bXstEMqB6FrD7Z0Wdu2aAstXVegTpO2tW/m3IPTLiwsgFDyXljQjNP5eRGY/ZeArBiAN+KJO1HuhW0469sis/PKGiZtG7netkjw1qDk7Zp7m1UMT95j58O4tTjZgj590NeDADY2ZESDfFHwiEPvzoIa/MvdWA06a63BS6LcTuR7t9ImxBBvUFf0jbUTtTmyXatZZuPlCR5/HwJQxcFPPTBzPC1m6wcJxsqHdvPfbrdcd2b/Pv2QWUnMS0Wc6oD9jRKbmoaacPD5Tyifzt0FKJpMB9Ezwqk+Jw7Yz4dJTlxAoGBAN3+Iooa6d6Fqu3ty2g98aPLJWp3XuS/SQeMkCWg1+p9VsvtDWSAVAMdPN8bxdUO7he+RdWEhlLwLYw9Om3e7OiTep96FEg94EezXtaQarYZWTw5bqPX2HN7f81mXudKWd0gs7gTzlYGudRfz+q0dg0ikhwFeVMQ2z6oSZenhA1tAoGBANmDl3DaaQENj2A3rUKfjJm/JW1IrGnUCQYFTE/KnZHW/TPIGQCGOrmtdpSs3Ou2YLLvnAl++S8ISbMqKvTQIZv0YUcXY0OnwJHa2J1BBwCbOO8kQB2aBkYFIyJOXXoe3y94ZAD1hdm+yhFzY56IxhArxty7gD/xwMeNzhyb4bS1AoGAPc3xQ832arOAQTnBNcZ5Lgby5c9SJhFzfZyOzUsYkfpPXfsjjWWE/lD3j44l6Al+FDIvMyDwXMrtg2vQhqJYBvB4ZUoRt4MynAO+VbJjY0tvYqsCuK7xXkV18XOc3HwAxOXD423wNlctCYmbU1bmvwVu9Eo52vyIbctgoc5Ln4kCgYEAoeo8BE0BV0BR10z605pTHmvUn3o2pfypzuqIuOjZzKNeDnrIacSB2JAQsnHPbkNvziNhYww6z9D6k70zBtQcAKy08Seuw8EPL0PadYzfeosRoaq5c4+hVeQjGDl/ihWLDBoxTyl1PvawErdzk6K61XTQ7qVAvdjnKWUc5dz/8fUCgYBTHpwJWxl922u366Nvya5SZyJvVteW2c9NAt4IcFq3sSDy87BuO/METg5MGuVqzOvmEeFP8pWA3Rhsl7AbuhXtor9Pwcfz3pndRwudgW6MGJSK6XnxkhrfhOhzxLZtqJA6TgsUT0llnWbsvB2TX5Wmtqr95rjjhrX4n4H66oEJEw==';

    $res = "-----BEGIN RSA PRIVATE KEY-----\n" .
        wordwrap($privateKey, 64, "\n", true) .
        "\n-----END RSA PRIVATE KEY-----";

    openssl_private_decrypt(base64_decode($secret), $oldData, $res);

    return $oldData;
}

$string = 'fuliang';
$secret = encrypt($string);
echo decrypt($secret);