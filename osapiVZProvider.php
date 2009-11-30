<?php
/*
 * Copyright 2009 Florian Holzhauer <fh-osapi@fholzhauer.de>
 *
 * Sponsored by weLike GmbH - http://www.welike.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Wrappers for StudiVZ, SchuelerVZ, MeinVZ and the Sandbox. To be used with the opensocial php client
 * found at http://code.google.com/p/opensocial-php-client/
 *
 */

class osapiVZProvider extends osapiProvider {

    public function __construct($restUrl, $providerTitle, $httpProvider = null) {
        parent::__construct(null, null, null, $restUrl, null, $providerTitle, true, $httpProvider);
    }
}

class osapiSandboxVZProvider extends osapiVZProvider {

    public function __construct(osapiHttpProvider $httpProvider = null) {
        parent::__construct('http://sandbox.gadgets.apivz.net/social/rest', 'SandboxVZ', $httpProvider);
    }

    public function getSignatureMethod() {
        return new osapiSandboxVZSignatureMethod();
    }
}

class osapiStudiVZProvider extends osapiVZProvider {

    public function __construct(osapiHttpProvider $httpProvider = null) {
        parent::__construct('http://studivz.gadgets.apivz.net/social/rest', 'StudiVZ', $httpProvider);
    }

    public function getSignatureMethod() {
        return new osapiStudiVZSignatureMethod();
    }
}

class osapiSchuelerVZProvider extends osapiVZProvider {

    public function __construct(osapiHttpProvider $httpProvider = null) {
        parent::__construct('http://schuelervz.gadgets.apivz.net/social/rest', 'SchuelerVZ', $httpProvider);
    }

    public function getSignatureMethod() {
        return new osapiSchuelerVZSignatureMethod();
    }
}

class osapiMeinVZProvider extends osapiVZProvider {

    public function __construct(osapiHttpProvider $httpProvider = null) {
        parent::__construct('http://meinvz.gadgets.apivz.net/social/rest', 'MeinVZ', $httpProvider);
    }

    public function getSignatureMethod() {
        return new osapiMeinVZSignatureMethod();
    }
}

//stub for now, see note about oauth_consumer_key in the comments above.
class osapiVZSignatureMethod extends OAuthSignatureMethod_RSA_SHA1 {
}

class osapiSandboxVZSignatureMethod extends osapiVZSignatureMethod {

    protected function fetch_public_cert(&$request) {
        return <<<EOT
-----BEGIN CERTIFICATE-----
MIIDkzCCAvygAwIBAgIJANKwaPvVQ9nAMA0GCSqGSIb3DQEBBQUAMIGOMQswCQYD
VQQGEwJERTEQMA4GA1UECBMHR2VybWFueTEPMA0GA1UEBxMGQmVybGluMRUwEwYD
VQQKEwxzdHVkaVZaIEx0ZC4xEzARBgNVBAsTCk9wZW5Tb2NpYWwxDjAMBgNVBAMT
BW11cmNTMSAwHgYJKoZIhvcNAQkBFhFtdXJjc0BzdHVkaXZ6Lm5ldDAeFw0wOTA4
MjQxNTM5MjNaFw0xMDA4MjQxNTM5MjNaMIGOMQswCQYDVQQGEwJERTEQMA4GA1UE
CBMHR2VybWFueTEPMA0GA1UEBxMGQmVybGluMRUwEwYDVQQKEwxzdHVkaVZaIEx0
ZC4xEzARBgNVBAsTCk9wZW5Tb2NpYWwxDjAMBgNVBAMTBW11cmNTMSAwHgYJKoZI
hvcNAQkBFhFtdXJjc0BzdHVkaXZ6Lm5ldDCBnzANBgkqhkiG9w0BAQEFAAOBjQAw
gYkCgYEAtVrj4hHFQtKSHYTN7UqmfhcPOWKLmJiC5OTxby/qef8/MTjJ58yIYAbH
fj9YN2vKsIZYZaVyeJpOMeKqRqw/daBKaGcW9ePqmxLYYvsolxPPXxdRKlYdKa/7
zo4kKyfZZ9fLtSlkQs12SJLxa53BkfugSTw5EAQKRmEHsZQ3mLkCAwEAAaOB9jCB
8zAdBgNVHQ4EFgQUrnNSvWS19/tMKMzgOP1W8I7r6NowgcMGA1UdIwSBuzCBuIAU
rnNSvWS19/tMKMzgOP1W8I7r6NqhgZSkgZEwgY4xCzAJBgNVBAYTAkRFMRAwDgYD
VQQIEwdHZXJtYW55MQ8wDQYDVQQHEwZCZXJsaW4xFTATBgNVBAoTDHN0dWRpVlog
THRkLjETMBEGA1UECxMKT3BlblNvY2lhbDEOMAwGA1UEAxMFbXVyY1MxIDAeBgkq
hkiG9w0BCQEWEW11cmNzQHN0dWRpdnoubmV0ggkA0rBo+9VD2cAwDAYDVR0TBAUw
AwEB/zANBgkqhkiG9w0BAQUFAAOBgQAvKHI4MocFggliGJXkLMdcT2P7jBnMzw6w
7XxJPl1nGhG/awMpoJyplsevm2lkLslCDWXWXqHdBbeMwBsiRRn/i0Gooxn8heyl
0hHJYau9OvUPaSSvW8JB35TvMgFWtwrPchZe86xAwEX4NZZ4AFcu7AOSJgNKZC6Z
uJQBPvSfeA==
-----END CERTIFICATE-----
EOT;
    }
}

class osapiStudiVZSignatureMethod extends osapiVZSignatureMethod {

    protected function fetch_public_cert(&$request) {
        return <<<EOT
-----BEGIN CERTIFICATE-----
MIIDkzCCAvygAwIBAgIJANKwaPvVQ9nAMA0GCSqGSIb3DQEBBQUAMIGOMQswCQYD
VQQGEwJERTEQMA4GA1UECBMHR2VybWFueTEPMA0GA1UEBxMGQmVybGluMRUwEwYD
VQQKEwxzdHVkaVZaIEx0ZC4xEzARBgNVBAsTCk9wZW5Tb2NpYWwxDjAMBgNVBAMT
BW11cmNTMSAwHgYJKoZIhvcNAQkBFhFtdXJjc0BzdHVkaXZ6Lm5ldDAeFw0wOTA4
MjQxNTM5MjNaFw0xMDA4MjQxNTM5MjNaMIGOMQswCQYDVQQGEwJERTEQMA4GA1UE
CBMHR2VybWFueTEPMA0GA1UEBxMGQmVybGluMRUwEwYDVQQKEwxzdHVkaVZaIEx0
ZC4xEzARBgNVBAsTCk9wZW5Tb2NpYWwxDjAMBgNVBAMTBW11cmNTMSAwHgYJKoZI
hvcNAQkBFhFtdXJjc0BzdHVkaXZ6Lm5ldDCBnzANBgkqhkiG9w0BAQEFAAOBjQAw
gYkCgYEAtVrj4hHFQtKSHYTN7UqmfhcPOWKLmJiC5OTxby/qef8/MTjJ58yIYAbH
fj9YN2vKsIZYZaVyeJpOMeKqRqw/daBKaGcW9ePqmxLYYvsolxPPXxdRKlYdKa/7
zo4kKyfZZ9fLtSlkQs12SJLxa53BkfugSTw5EAQKRmEHsZQ3mLkCAwEAAaOB9jCB
8zAdBgNVHQ4EFgQUrnNSvWS19/tMKMzgOP1W8I7r6NowgcMGA1UdIwSBuzCBuIAU
rnNSvWS19/tMKMzgOP1W8I7r6NqhgZSkgZEwgY4xCzAJBgNVBAYTAkRFMRAwDgYD
VQQIEwdHZXJtYW55MQ8wDQYDVQQHEwZCZXJsaW4xFTATBgNVBAoTDHN0dWRpVlog
THRkLjETMBEGA1UECxMKT3BlblNvY2lhbDEOMAwGA1UEAxMFbXVyY1MxIDAeBgkq
hkiG9w0BCQEWEW11cmNzQHN0dWRpdnoubmV0ggkA0rBo+9VD2cAwDAYDVR0TBAUw
AwEB/zANBgkqhkiG9w0BAQUFAAOBgQAvKHI4MocFggliGJXkLMdcT2P7jBnMzw6w
7XxJPl1nGhG/awMpoJyplsevm2lkLslCDWXWXqHdBbeMwBsiRRn/i0Gooxn8heyl
0hHJYau9OvUPaSSvW8JB35TvMgFWtwrPchZe86xAwEX4NZZ4AFcu7AOSJgNKZC6Z
uJQBPvSfeA==
-----END CERTIFICATE-----
EOT;
    }
}

class osapiSchuelerVZSignatureMethod extends osapiVZSignatureMethod {

    protected function fetch_public_cert(&$request) {
        return <<<EOT
-----BEGIN CERTIFICATE-----
MIIDkzCCAvygAwIBAgIJANKwaPvVQ9nAMA0GCSqGSIb3DQEBBQUAMIGOMQswCQYD
VQQGEwJERTEQMA4GA1UECBMHR2VybWFueTEPMA0GA1UEBxMGQmVybGluMRUwEwYD
VQQKEwxzdHVkaVZaIEx0ZC4xEzARBgNVBAsTCk9wZW5Tb2NpYWwxDjAMBgNVBAMT
BW11cmNTMSAwHgYJKoZIhvcNAQkBFhFtdXJjc0BzdHVkaXZ6Lm5ldDAeFw0wOTA4
MjQxNTM5MjNaFw0xMDA4MjQxNTM5MjNaMIGOMQswCQYDVQQGEwJERTEQMA4GA1UE
CBMHR2VybWFueTEPMA0GA1UEBxMGQmVybGluMRUwEwYDVQQKEwxzdHVkaVZaIEx0
ZC4xEzARBgNVBAsTCk9wZW5Tb2NpYWwxDjAMBgNVBAMTBW11cmNTMSAwHgYJKoZI
hvcNAQkBFhFtdXJjc0BzdHVkaXZ6Lm5ldDCBnzANBgkqhkiG9w0BAQEFAAOBjQAw
gYkCgYEAtVrj4hHFQtKSHYTN7UqmfhcPOWKLmJiC5OTxby/qef8/MTjJ58yIYAbH
fj9YN2vKsIZYZaVyeJpOMeKqRqw/daBKaGcW9ePqmxLYYvsolxPPXxdRKlYdKa/7
zo4kKyfZZ9fLtSlkQs12SJLxa53BkfugSTw5EAQKRmEHsZQ3mLkCAwEAAaOB9jCB
8zAdBgNVHQ4EFgQUrnNSvWS19/tMKMzgOP1W8I7r6NowgcMGA1UdIwSBuzCBuIAU
rnNSvWS19/tMKMzgOP1W8I7r6NqhgZSkgZEwgY4xCzAJBgNVBAYTAkRFMRAwDgYD
VQQIEwdHZXJtYW55MQ8wDQYDVQQHEwZCZXJsaW4xFTATBgNVBAoTDHN0dWRpVlog
THRkLjETMBEGA1UECxMKT3BlblNvY2lhbDEOMAwGA1UEAxMFbXVyY1MxIDAeBgkq
hkiG9w0BCQEWEW11cmNzQHN0dWRpdnoubmV0ggkA0rBo+9VD2cAwDAYDVR0TBAUw
AwEB/zANBgkqhkiG9w0BAQUFAAOBgQAvKHI4MocFggliGJXkLMdcT2P7jBnMzw6w
7XxJPl1nGhG/awMpoJyplsevm2lkLslCDWXWXqHdBbeMwBsiRRn/i0Gooxn8heyl
0hHJYau9OvUPaSSvW8JB35TvMgFWtwrPchZe86xAwEX4NZZ4AFcu7AOSJgNKZC6Z
uJQBPvSfeA==
-----END CERTIFICATE-----
EOT;
    }
}

class osapiMeinVZSignatureMethod extends osapiVZSignatureMethod {

    protected function fetch_public_cert(&$request) {
        return <<<EOT
-----BEGIN CERTIFICATE-----
MIIDkzCCAvygAwIBAgIJANKwaPvVQ9nAMA0GCSqGSIb3DQEBBQUAMIGOMQswCQYD
VQQGEwJERTEQMA4GA1UECBMHR2VybWFueTEPMA0GA1UEBxMGQmVybGluMRUwEwYD
VQQKEwxzdHVkaVZaIEx0ZC4xEzARBgNVBAsTCk9wZW5Tb2NpYWwxDjAMBgNVBAMT
BW11cmNTMSAwHgYJKoZIhvcNAQkBFhFtdXJjc0BzdHVkaXZ6Lm5ldDAeFw0wOTA4
MjQxNTM5MjNaFw0xMDA4MjQxNTM5MjNaMIGOMQswCQYDVQQGEwJERTEQMA4GA1UE
CBMHR2VybWFueTEPMA0GA1UEBxMGQmVybGluMRUwEwYDVQQKEwxzdHVkaVZaIEx0
ZC4xEzARBgNVBAsTCk9wZW5Tb2NpYWwxDjAMBgNVBAMTBW11cmNTMSAwHgYJKoZI
hvcNAQkBFhFtdXJjc0BzdHVkaXZ6Lm5ldDCBnzANBgkqhkiG9w0BAQEFAAOBjQAw
gYkCgYEAtVrj4hHFQtKSHYTN7UqmfhcPOWKLmJiC5OTxby/qef8/MTjJ58yIYAbH
fj9YN2vKsIZYZaVyeJpOMeKqRqw/daBKaGcW9ePqmxLYYvsolxPPXxdRKlYdKa/7
zo4kKyfZZ9fLtSlkQs12SJLxa53BkfugSTw5EAQKRmEHsZQ3mLkCAwEAAaOB9jCB
8zAdBgNVHQ4EFgQUrnNSvWS19/tMKMzgOP1W8I7r6NowgcMGA1UdIwSBuzCBuIAU
rnNSvWS19/tMKMzgOP1W8I7r6NqhgZSkgZEwgY4xCzAJBgNVBAYTAkRFMRAwDgYD
VQQIEwdHZXJtYW55MQ8wDQYDVQQHEwZCZXJsaW4xFTATBgNVBAoTDHN0dWRpVlog
THRkLjETMBEGA1UECxMKT3BlblNvY2lhbDEOMAwGA1UEAxMFbXVyY1MxIDAeBgkq
hkiG9w0BCQEWEW11cmNzQHN0dWRpdnoubmV0ggkA0rBo+9VD2cAwDAYDVR0TBAUw
AwEB/zANBgkqhkiG9w0BAQUFAAOBgQAvKHI4MocFggliGJXkLMdcT2P7jBnMzw6w
7XxJPl1nGhG/awMpoJyplsevm2lkLslCDWXWXqHdBbeMwBsiRRn/i0Gooxn8heyl
0hHJYau9OvUPaSSvW8JB35TvMgFWtwrPchZe86xAwEX4NZZ4AFcu7AOSJgNKZC6Z
uJQBPvSfeA==
-----END CERTIFICATE-----
EOT;
    }
}

