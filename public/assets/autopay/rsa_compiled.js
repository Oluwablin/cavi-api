(function(){/*
 A Google-closure-compiler-advanced-optimized slightly-altered adaptation of Tom Wu's
 RSA encrypter, wrapped in an anonymous self-invoking function to make closure-compiler's
 211 "dangerous use of the global this object" warnings moot, and to introduce into global 
 scope only RSAKey.setPublic(n,e), which sets the RSAKey public key, and RSAKey.encrypt(str), 
 which produces the PKCS#1 encryption of an input string as an even-length hex string.

 example usage:

 var rsa = new RSAKey();
 rsa.setPublic(n,e);	//the modulus and the public exponent
 var encStr=rsa.encrypt(str);

 --which can be decrypted on a Java server, for example, by a javax.crypto.Cipher:
 Cipher de=Cipher.getInstance("RSA/ECB/PKCS1Padding");

 Tom Wu's BSD License is here: http://www-cs-students.stanford.edu/~tjw/jsbn/LICENSE

 Changes and adaptations Copyright 2011, Peter Rowntree. 
 http://www.hdyn.com/mail/contact.php?addr=pr

 License: http://www.apache.org/licenses/LICENSE-2.0
*/
var j=null;window.RSAKey=RSAKey;window["RSAKey.encrypt"]=RSAKey.encrypt;window["RSAKey.setPublic"]=RSAKey.setPublic;var k;function l(a,c,b){a!=j&&("number"==typeof a?this.F(a,c,b):c==j&&"string"!=typeof a?n(this,a,256):n(this,a,c))}function p(){return new l(j)}function q(a,c,b,d,e,f){for(;--f>=0;){var g=c*this[a++]+b[d]+e,e=Math.floor(g/67108864);b[d++]=g&67108863}return e}function r(a,c,b,d,e,f){var g=c&32767;for(c>>=15;--f>=0;){var h=this[a]&32767,m=this[a++]>>15,i=c*h+m*g,h=g*h+((i&32767)<<15)+b[d]+(e&1073741823),e=(h>>>30)+(i>>>15)+c*m+(e>>>30);b[d++]=h&1073741823}return e}
function s(a,c,b,d,e,f){var g=c&16383;for(c>>=14;--f>=0;){var h=this[a]&16383,m=this[a++]>>14,i=c*h+m*g,h=g*h+((i&16383)<<14)+b[d]+e,e=(h>>28)+(i>>14)+c*m;b[d++]=h&268435455}return e}navigator.appName=="Microsoft Internet Explorer"?(l.prototype.i=r,k=30):navigator.appName!="Netscape"?(l.prototype.i=q,k=26):(l.prototype.i=s,k=28);l.prototype.c=k;l.prototype.g=(1<<k)-1;l.prototype.h=1<<k;l.prototype.u=Math.pow(2,52);l.prototype.l=52-k;l.prototype.m=2*k-52;var t=[],w,x;w="0".charCodeAt(0);
for(x=0;x<=9;++x)t[w++]=x;w="a".charCodeAt(0);for(x=10;x<36;++x)t[w++]=x;w="A".charCodeAt(0);for(x=10;x<36;++x)t[w++]=x;function y(a){var c=p();c.a=1;c.b=a<0?-1:0;a>0?c[0]=a:a<-1?c[0]=a+DV:c.a=0;return c}function z(a){var c=1,b;if((b=a>>>16)!=0)a=b,c+=16;if((b=a>>8)!=0)a=b,c+=8;if((b=a>>4)!=0)a=b,c+=4;if((b=a>>2)!=0)a=b,c+=2;a>>1!=0&&(c+=1);return c}function A(a){this.d=a}A.prototype.n=function(a){if(a.b<0||B(a,this.d)>=0){var c=this.d,b=p();C(a.abs(),c,b);a.b<0&&B(b,D)>0&&E(c,b,b);a=b}return a};
A.prototype.s=function(a){return a};A.prototype.reduce=function(a){C(a,this.d,a)};A.prototype.r=function(a,c,b){F(a,c,b);this.reduce(b)};A.prototype.t=function(a,c){H(a,c);this.reduce(c)};function I(a){this.d=a;var c;if(a.a<1)c=0;else if(c=a[0],(c&1)==0)c=0;else{var b=c&3,b=b*(2-(c&15)*b)&15,b=b*(2-(c&255)*b)&255,b=b*(2-((c&65535)*b&65535))&65535,b=b*(2-c*b%a.h)%a.h;c=b>0?a.h-b:-b}this.p=c;this.q=this.p&32767;this.v=this.p>>15;this.z=(1<<a.c-15)-1;this.w=2*a.a}
I.prototype.n=function(a){var c=p();J(a.abs(),this.d.a,c);C(c,this.d,c);a.b<0&&B(c,D)>0&&E(this.d,c,c);return c};I.prototype.s=function(a){var c=p();a.copyTo(c);this.reduce(c);return c};
I.prototype.reduce=function(a){for(;a.a<=this.w;)a[a.a++]=0;for(var c=0;c<this.d.a;++c){var b=a[c]&32767,d=b*this.q+((b*this.v+(a[c]>>15)*this.q&this.z)<<15)&a.g,b=c+this.d.a;for(a[b]+=this.d.i(0,d,a,c,0,this.d.a);a[b]>=a.h;)a[b]-=a.h,a[++b]++}K(a);for(b=c=this.d.a;b<a.a;++b)a[b-c]=a[b];a.a=Math.max(a.a-c,0);a.b=a.b;B(a,this.d)>=0&&E(a,this.d,a)};I.prototype.r=function(a,c,b){F(a,c,b);this.reduce(b)};I.prototype.t=function(a,c){H(a,c);this.reduce(c)};
l.prototype.copyTo=function(a){for(var c=this.a-1;c>=0;--c)a[c]=this[c];a.a=this.a;a.b=this.b};
function n(a,c,b){if(b==16)b=4;else if(b==8)b=3;else if(b==256)b=8;else if(b==2)b=1;else if(b==32)b=5;else if(b==4)b=2;else{a.G(c,b);return}a.a=0;a.b=0;for(var d=c.length,e=!1,f=0;--d>=0;){var g;b==8?g=c[d]&255:(g=t[c.charCodeAt(d)],g=g==j?-1:g);g<0?c.charAt(d)=="-"&&(e=!0):(e=!1,f==0?a[a.a++]=g:f+b>a.c?(a[a.a-1]|=(g&(1<<a.c-f)-1)<<f,a[a.a++]=g>>a.c-f):a[a.a-1]|=g<<f,f+=b,f>=a.c&&(f-=a.c))}if(b==8&&(c[0]&128)!=0)a.b=-1,f>0&&(a[a.a-1]|=(1<<a.c-f)-1<<f);K(a);e&&E(D,a,a)}
function K(a){for(var c=a.b&a.g;a.a>0&&a[a.a-1]==c;)--a.a}function J(a,c,b){var d;for(d=a.a-1;d>=0;--d)b[d+c]=a[d];for(d=c-1;d>=0;--d)b[d]=0;b.a=a.a+c;b.b=a.b}function L(a,c,b){var d=c%a.c,e=a.c-d,f=(1<<e)-1,c=Math.floor(c/a.c),g=a.b<<d&a.g,h;for(h=a.a-1;h>=0;--h)b[h+c+1]=a[h]>>e|g,g=(a[h]&f)<<d;for(h=c-1;h>=0;--h)b[h]=0;b[c]=g;b.a=a.a+c+1;b.b=a.b;K(b)}
function E(a,c,b){for(var d=0,e=0,f=Math.min(c.a,a.a);d<f;)e+=a[d]-c[d],b[d++]=e&a.g,e>>=a.c;if(c.a<a.a){for(e-=c.b;d<a.a;)e+=a[d],b[d++]=e&a.g,e>>=a.c;e+=a.b}else{for(e+=a.b;d<c.a;)e-=c[d],b[d++]=e&a.g,e>>=a.c;e-=c.b}b.b=e<0?-1:0;e<-1?b[d++]=a.h+e:e>0&&(b[d++]=e);b.a=d;K(b)}function F(a,c,b){var d=a.abs(),e=c.abs(),f=d.a;for(b.a=f+e.a;--f>=0;)b[f]=0;for(f=0;f<e.a;++f)b[f+d.a]=d.i(0,e[f],b,f,0,d.a);b.b=0;K(b);a.b!=c.b&&E(D,b,b)}
function H(a,c){for(var b=a.abs(),d=c.a=2*b.a;--d>=0;)c[d]=0;for(d=0;d<b.a-1;++d){var e=b.i(d,b[d],c,2*d,0,1);if((c[d+b.a]+=b.i(d+1,2*b[d],c,2*d+1,e,b.a-d-1))>=b.h)c[d+b.a]-=b.h,c[d+b.a+1]=1}c.a>0&&(c[c.a-1]+=b.i(d,b[d],c,2*d,0,1));c.b=0;K(c)}
function C(a,c,b){var d=c.abs();if(!(d.a<=0)){var e=a.abs();if(e.a<d.a)b!=j&&a.copyTo(b);else{b==j&&(b=p());var f=p(),c=a.b,g=a.c-z(d[d.a-1]);g>0?(L(d,g,f),L(e,g,b)):(d.copyTo(f),e.copyTo(b));d=f.a;e=f[d-1];if(e!=0){var h=e*(1<<a.l)+(d>1?f[d-2]>>a.m:0),m=a.u/h,h=(1<<a.l)/h,i=1<<a.m,o=b.a,v=o-d,u=p();J(f,v,u);B(b,u)>=0&&(b[b.a++]=1,E(b,u,b));J(M,d,u);for(E(u,f,f);f.a<d;)f[f.a++]=0;for(;--v>=0;){var G=b[--o]==e?a.g:Math.floor(b[o]*m+(b[o-1]+i)*h);if((b[o]+=f.i(0,G,b,v,0,d))<G){J(f,v,u);for(E(b,u,b);b[o]<
--G;)E(b,u,b)}}b.a=d;K(b);if(g>0)if(f=a=b,f.b=a.b,d=Math.floor(g/a.c),d>=a.a)f.a=0;else{g%=a.c;e=a.c-g;m=(1<<g)-1;f[0]=a[d]>>g;for(h=d+1;h<a.a;++h)f[h-d-1]|=(a[h]&m)<<e,f[h-d]=a[h]>>g;g>0&&(f[a.a-d-1]|=(a.b&m)<<e);f.a=a.a-d;K(f)}c<0&&E(D,b,b)}}}}l.prototype.exp=function(a,c){if(a>4294967295||a<1)return M;var b=p(),d=p(),e=c.n(this),f=z(a)-1;for(e.copyTo(b);--f>=0;)if(c.t(b,d),(a&1<<f)>0)c.r(d,e,b);else var g=b,b=d,d=g;return c.s(b)};
l.prototype.toString=function(a){if(this.b<0)return"-"+N(this).toString(a);if(a==16)a=4;else if(a==8)a=3;else if(a==2)a=1;else if(a==32)a=5;else if(a==4)a=2;else return this.J(a);var c=(1<<a)-1,b,d=!1,e="",f=this.a,g=this.c-f*this.c%a;if(f-- >0){if(g<this.c&&(b=this[f]>>g)>0)d=!0,e="0123456789abcdefghijklmnopqrstuvwxyz".charAt(b);for(;f>=0;)g<a?(b=(this[f]&(1<<g)-1)<<a-g,b|=this[--f]>>(g+=this.c-a)):(b=this[f]>>(g-=a)&c,g<=0&&(g+=this.c,--f)),b>0&&(d=!0),d&&(e+="0123456789abcdefghijklmnopqrstuvwxyz".charAt(b))}return d?
e:"0"};function N(a){var c=p();E(D,a,c);return c}l.prototype.abs=function(){return this.b<0?N(this):this};function B(a,c){var b=a.b-c.b;if(b!=0)return b;var d=a.a,b=d-c.a;if(b!=0)return b;for(;--d>=0;)if((b=a[d]-c[d])!=0)return b;return 0}var D=y(0),M=y(1);function RSAKey(){this.f=j;this.o=0;this.A=this.D=this.C=this.I=this.H=this.B=j}RSAKey.prototype.setPublic=function(a,c){a!=j&&c!=j&&a.length>0&&c.length>0?(this.f=new l(a,16),this.o=parseInt(c,16)):alert("Invalid RSA public key")};
RSAKey.prototype.encrypt=function(a){var c;c=(this.f.a<=0?0:this.f.c*(this.f.a-1)+z(this.f[this.f.a-1]^this.f.b&this.f.g))+7>>3;if(c<a.length+11)alert("Message too long for RSA"),c=j;else{for(var b=[],d=a.length-1;d>=0&&c>0;){var e=a.charCodeAt(d--);e<128?b[--c]=e:e>127&&e<2048?(b[--c]=e&63|128,b[--c]=e>>6|192):(b[--c]=e&63|128,b[--c]=e>>6&63|128,b[--c]=e>>12|224)}b[--c]=0;for(a=[];c>2;){for(a[0]=0;a[0]==0;){d=a;e=void 0;for(e=0;e<d.length;++e){var f=d,g=e,h;if(O==j){P();h=O=new Q;for(var m=R,i=void 0,
o=void 0,v=void 0,i=0;i<256;++i)h.e[i]=i;for(i=o=0;i<256;++i)o=o+h.e[i]+m[i%m.length]&255,v=h.e[i],h.e[i]=h.e[o],h.e[o]=v;h.j=0;for(S=h.k=0;S<R.length;++S)R[S]=0;S=0}h=O.next();f[g]=h}}b[--c]=a[0]}b[--c]=2;b[--c]=0;c=new l(b)}if(c==j)return j;b=this.o;a=this.f;a=b<256||(a.a>0?a[0]&1:a.b)==0?new A(a):new I(a);c=c.exp(b,a);if(c==j)return j;c=c.toString(16);return(c.length&1)==0?c:"0"+c};var O,R,S;function P(){var a=(new Date).getTime();R[S++]^=a&255;R[S++]^=a>>8&255;R[S++]^=a>>16&255;R[S++]^=a>>24&255;S>=T&&(S-=T)}if(R==j){R=[];S=0;var U;if(navigator.appName=="Netscape"&&navigator.appVersion<"5"&&window.crypto){var V=window.crypto.random(32);for(U=0;U<V.length;++U)R[S++]=V.charCodeAt(U)&255}for(;S<T;)U=Math.floor(65536*Math.random()),R[S++]=U>>>8,R[S++]=U&255;S=0;P()};function Q(){this.k=this.j=0;this.e=[]}Q.prototype.next=function(){var a;this.j=this.j+1&255;this.k=this.k+this.e[this.j]&255;a=this.e[this.j];this.e[this.j]=this.e[this.k];this.e[this.k]=a;return this.e[a+this.e[this.j]&255]};var T=256;})();
