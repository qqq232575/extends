<?php
/**
 * Xin ��������֧���ӿ���
 *
 * @ author��Xin
 *
 * @ date��2015-5-13
 */

class unionpaySDK{

	function __construct(){
		$this->sign_cert_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'duobao96567.pfx';
        $this->encrtpy_cert_path = dirname(__FILE__).DIRECTORY_SEPARATOR;
		$this->cert_passwd = 'xxxxxx';//֤����Կ
	}
	/**
	 * ǩ��
	 *
	 * @param String $params_str
	 */
	function sign(&$params) {
		if(isset($params['transTempUrl'])){
			unset($params['transTempUrl']);
		}
		// ת����key=val&��
		$params_str = $this->coverParamsToString ( $params );

		$params_sha1x16 = sha1 ( $params_str, FALSE );
		// ǩ��֤��·��
		$cert_path = $this->sign_cert_path;
		$private_key = $this->getPrivateKey ( $cert_path );
		// ǩ��
		$sign_falg = openssl_sign ( $params_sha1x16, $signature, $private_key, OPENSSL_ALGO_SHA1 );
		if ($sign_falg) {
			$signature_base64 = base64_encode ( $signature );
			return $signature_base64;
		} else {
			//$log->LogInfo ( ">>>>>ǩ��ʧ��<<<<<<<" );
		}
	}

	/**
	 * ǩ��֤��ID
	 *
	 * @return unknown
	 */
	function getSignCertId() {
		// ǩ��֤��·��
		return $this->getCertId ( $this->sign_cert_path );
	}

	/**
	 * ȡ֤��ID(.pfx)
	 *
	 * @return unknown
	 */
	function getCertId($cert_path) {
		$pkcs12certdata = file_get_contents ( $cert_path );
		openssl_pkcs12_read ( $pkcs12certdata, $certs, $this->cert_passwd );
		$x509data = $certs ['cert'];
		openssl_x509_read ( $x509data );
		$certdata = openssl_x509_parse ( $x509data );
		$cert_id = $certdata ['serialNumber'];
		return $cert_id;
	}

	/**
	 * ����(ǩ��)֤��˽Կ -
	 *
	 * @return unknown
	 */
	function getPrivateKey($cert_path) {
		$pkcs12 = file_get_contents ( $cert_path );
		openssl_pkcs12_read ( $pkcs12, $certs, $this->cert_passwd );
		return $certs ['pkey'];
	}

	/**
	 * ��ǩ
	 *
	 * @param String $params_str
	 * @param String $signature_str
	 */
	function verify($params) {
		// ��Կ
		$public_key = $this->getPulbicKeyByCertId ( $params ['certId'] );
		// ǩ����
		$signature_str = $params ['signature'];
		unset ( $params ['signature'] );
		$params_str = $this->coverParamsToString ( $params );
		$signature = base64_decode ( $signature_str );
//	echo date('Y-m-d',time());
		$params_sha1x16 = sha1 ( $params_str, FALSE );
		$isSuccess = openssl_verify ( $params_sha1x16, $signature,$public_key, OPENSSL_ALGO_SHA1 );
		return $isSuccess;
	}

    /**
     * ����֤��ID ���� ֤��
     *
     * @param unknown_type $certId
     * @return string NULL
     */
    function getPulbicKeyByCertId($certId) {
        // ֤��Ŀ¼
        $cert_dir = $this->encrtpy_cert_path;
        $handle = opendir ( $cert_dir );
        if ($handle) {
            while ( $file = readdir ( $handle ) ) {
                clearstatcache ();
                $filePath = $cert_dir . '/' . $file;
                if (is_file ( $filePath )) {
                    if (pathinfo ( $file, PATHINFO_EXTENSION ) == 'cer') {
                        if ($this->getCertIdByCerPath ( $filePath ) == $certId) {
                            closedir ( $handle );
                            return $this->getPublicKey ( $filePath );
                        }
                    }
                }
            }
            return( 'û���ҵ�֤��IDΪ[' . $certId . ']��֤��' );
        } else {
            return( '֤��Ŀ¼ ' . $cert_dir . '����ȷ' );
        }
        closedir ( $handle );
        return null;
    }

    /**
     * ȡ֤�鹫Կ -��ǩ
     *
     * @return string
     */
    function getPublicKey($cert_path) {
        return file_get_contents ( $cert_path );
    }

    /**
     * ȡ֤��ID(.cer)
     *
     * @param unknown_type $cert_path
     */
    function getCertIdByCerPath($cert_path) {
        $x509data = file_get_contents ( $cert_path );
        openssl_x509_read ( $x509data );
        $certdata = openssl_x509_parse ( $x509data );
        $cert_id = $certdata ['serialNumber'];
        return $cert_id;
    }

	/**
	 * ���� �����ת��Ϊ���崮
	 *
	 * @param array $params
	 * @return string
	 */
	function coverParamsToString($params) {
		$sign_str = '';
		// ����
		ksort ( $params );
		foreach ( $params as $key => $val ) {
			if ($key == 'signature') {
				continue;
			}
			$sign_str .= sprintf ( "%s=%s&", $key, $val );
			// $sign_str .= $key . '=' . $val . '&';
		}
		return substr ( $sign_str, 0, strlen ( $sign_str ) - 1 );
	}

	/**
	 * �ַ���ת��Ϊ ����
	 *
	 * @param unknown_type $str
	 * @return multitype:unknown
	 */
	function coverStringToArray($str) {
		$result = array ();

		if (! empty ( $str )) {
			$temp = preg_split ( '/&/', $str );
			if (! empty ( $temp )) {
				foreach ( $temp as $key => $val ) {
					$arr = preg_split ( '/=/', $val, 2 );
					if (! empty ( $arr )) {
						$k = $arr ['0'];
						$v = $arr ['1'];
						$result [$k] = $v;
					}
				}
			}
		}
		return $result;
	}

	/**
	 * �����Զ��ύ��
	 *
	 * @param unknown_type $params
	 * @param unknown_type $action
	 * @return string
	 */
	function create_html($params, $action) {
		$encodeType = isset ( $params ['encoding'] ) ? $params ['encoding'] : 'UTF-8';
		$html = <<<eot
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset={$encodeType}" />
</head>
<body onload="javascript:document.pay_form.submit();">
    <form id="pay_form" name="pay_form" action="{$action}" method="post">

eot;
		foreach ( $params as $key => $value ) {
			$html .= "    <input type=\"hidden\" name=\"{$key}\" id=\"{$key}\" value=\"{$value}\" />\n";
		}
		$html .= <<<eot
    <input type="submit" type="hidden" style="display:none">
    </form>
</body>
</html>
eot;
		return $html;
	}
}
