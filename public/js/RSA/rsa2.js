
function pkcs1unpad2(g,j){var a=g.toByteArray();var f=0;while(f<a.length&&a[f]==0){++f}if(a.length-f!=j-1||a[f]!=2){return null}++f;while(a[f]!=0){if(++f>=a.length){return null}}var e="";while(++f<a.length){var h=a[f]&255;if(h<128){e+=String.fromCharCode(h)}else{if((h>191)&&(h<224)){e+=String.fromCharCode(((h&31)<<6)|(a[f+1]&63));++f}else{e+=String.fromCharCode(((h&15)<<12)|((a[f+1]&63)<<6)|(a[f+2]&63));f+=2}}}return e}function RSASetPrivate(c,a,b){if(c!=null&&a!=null&&c.length>0&&a.length>0){this.n=parseBigInt(c,16);this.e=parseInt(a,16);this.d=parseBigInt(b,16)}else{alert("Invalid RSA private key")}}function RSASetPrivateEx(g,d,e,c,b,a,h,f){if(g!=null&&d!=null&&g.length>0&&d.length>0){this.n=parseBigInt(g,16);this.e=parseInt(d,16);this.d=parseBigInt(e,16);this.p=parseBigInt(c,16);this.q=parseBigInt(b,16);this.dmp1=parseBigInt(a,16);this.dmq1=parseBigInt(h,16);this.coeff=parseBigInt(f,16)}else{alert("Invalid RSA private key")}}function RSAGenerate(b,i){var a=new SecureRandom();var f=b>>1;this.e=parseInt(i,16);var c=new BigInteger(i,16);for(;;){for(;;){this.p=new BigInteger(b-f,1,a);if(this.p.subtract(BigInteger.ONE).gcd(c).compareTo(BigInteger.ONE)==0&&this.p.isProbablePrime(10)){break}}for(;;){this.q=new BigInteger(f,1,a);if(this.q.subtract(BigInteger.ONE).gcd(c).compareTo(BigInteger.ONE)==0&&this.q.isProbablePrime(10)){break}}if(this.p.compareTo(this.q)<=0){var h=this.p;this.p=this.q;this.q=h}var g=this.p.subtract(BigInteger.ONE);var d=this.q.subtract(BigInteger.ONE);var e=g.multiply(d);if(e.gcd(c).compareTo(BigInteger.ONE)==0){this.n=this.p.multiply(this.q);this.d=c.modInverse(e);this.dmp1=this.d.mod(g);this.dmq1=this.d.mod(d);this.coeff=this.q.modInverse(this.p);break}}}function RSADoPrivate(a){if(this.p==null||this.q==null){return a.modPow(this.d,this.n)}var c=a.mod(this.p).modPow(this.dmp1,this.p);var b=a.mod(this.q).modPow(this.dmq1,this.q);while(c.compareTo(b)<0){c=c.add(this.p)}return c.subtract(b).multiply(this.coeff).mod(this.p).multiply(this.q).add(b)}function RSADecrypt(b){var d=parseBigInt(b,16);var a=this.doPrivate(d);if(a==null){return null}return pkcs1unpad2(a,(this.n.bitLength()+7)>>3)}RSAKey.prototype.doPrivate=RSADoPrivate;RSAKey.prototype.setPrivate=RSASetPrivate;RSAKey.prototype.setPrivateEx=RSASetPrivateEx;RSAKey.prototype.generate=RSAGenerate;RSAKey.prototype.decrypt=RSADecrypt;