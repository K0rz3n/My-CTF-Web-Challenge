<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Stict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang = "zh-CN">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>The coward never comes in</title>
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/js/invitation_code.js"></script>
<script type="text/javascript" src="/js/calm.js"></script>

<style>
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: local('Montserrat-Regular'), url(./Montserrat-Regular.ttf) format('ttf');
}

@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: local('Raleway'), url(./Raleway.woff) format('woff');
}

body {
  background-color: black;
  color: white;
  font-family: 'Raleway', 'Trebuchet MS', 'Tahoma', 'Arial', 'Helvetica';
}

h1 {
  font-family: 'Montserrat', 'Trebuchet MS', 'Tahoma', 'Arial', 'Helvetica';
  font-size: 10ex;
  margin: 0ex 0.5ex 0.5ex 0.5ex;
}

.btext {
  color: #FFFFD0;
}

.rdot {
  color: red;
}

fieldset {
  border: 1px solid #005050;
  margin: 1ex 1% 2ex 1%;
  background-color: #101010;
}

fieldset.half {
  font-size: 85%;
}

legend {
  background-color: #101010;
  border: 1px solid #003030;
  padding: 0.8ex 2ex 0.8ex 2ex;
  font-style: italic;
  color: white;
}

fieldset.half legend {
  color: #a0a0a0;
}

a {
  color: #50E0FF;
}

a:hover {
  color: white;
}

a:visited {
  color: #F000C0;
}

a:visited:hover {
  color: white; 
}

a:active {
  color: #FFFF90;
}

ul {
  list-style-type: square;
  color: #005050;
}

li p {
  color: #e0e0c0;
  margin-bottom: 1.2ex;
  margin-top: 0ex;
}

table {
  margin: 0 1ex 0 1ex;
  padding: 0;
  border-collapse: collapse;
}

tr {
  margin: 0;
  padding: 0;
}

td {
  width: 50%;
  margin: 0;
  padding: 0;
  vertical-align: top;
}

.foot {
  margin: 0 2ex 0 2ex;
  font-size: 80%;
  color: gray;
  text-align: right;
}

#check:focus{
    outline: 0;
    border: 1px solid #f95d5d;
    box-shadow: 0px 0px 10px 0px #f95d5d;
    height:20px; 
    width:185px; 
  }

form {
	margin-left: 1100px;
	margin-top: 20px;
}


#submit {
    position: relative;
    display: inline-block;
    background: #D0EEFF;
    border: 1px solid #99D3F5;
    border-radius: 4px;
    padding: 4px 12px;
    overflow: hidden;
    color: #1E88C7;
    text-decoration: none;
    text-indent: 0;
    line-height: 13px;
}

#submit:hover {
    background: #AADFFD;
    border-color: #78C3F3;
    color: #004974;
    text-decoration: none;
}

#view {
  margin-left: 1100px;
  margin-top: 20px;
}


#code_name:focus{
    outline: 0;
    border: 1px solid #f95d5d;
    box-shadow: 0px 0px 10px 0px #f95d5d;
    height:20px; 
/*    width:100px; */
  }


</style>
</head>
<body>
<h1>Coward<span class=btext><span class=rdot>.</span>Never<span class=rdot>.</span>Comes</span><span class=rdot>.</span>In</h1>

<form  method = "POST" action = "#">
<lable>input your code name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable><input id = "code_name" name = "name" type = "text"><br>
<lable>input your invitation code </lable><input id = "check" name = "TOKEN" type = "text">
	<input id = "submit" name = "submit" type = "submit" value = "check">
</form>
<div id = "view"><?php require_once("./check_inv_code.php"); if($_POST['TOKEN'] && $_POST['name']){get_ip();}?></div>

<fieldset>
<legend>The stuff you are actually looking for</legend>
<ul>

<li> <p><b><a href='/afl/'>American Fuzzy Lop</a></b>, a remarkably nice guided fuzzing tool.</p>
<li> <p><b><a href='/tangled/'>The Tangled Web</a></b>, a lovingly-crafted book on web security.</p>
<li> <p><b><a href='/gcnc/'>Guerrilla Guide to CNC</a></b> and its <a href='/electronics/'>electronics-related</a> counterpart.</p>
<li> <p><b><a href='/p0f3/'>Passive OS fingerprinter</a></b>, better known as <i>p0f</i>.</p>
<li> <p><b><a href='/prep/'>Doomsday preparedness</a></b>, a guide for less crazy folk.</p>
<li> <p><b><a href='https://bbs.xdsec.org/t/sec'>My blog</a></b> and 
<a href='http://twitter.com'>my Twitter feed</a>, for frequent updates on
<a href='/postxss/'>security research</a>,
<a href='https://bbs.xdsec.org/t/sec'>privacy</a>, and
<a href='https://bbs.xdsec.org/t/sec'>other stuff</a>.</p>
  
</ul>
</fieldset>

<table><tr><td>

<fieldset class=half>
<legend>Noteworthy security tools</legend>
<ul>

<li> <p><b><a href='/afl/'>American Fuzzy Lop</a></b>, a fuzzer with an impressive track record of finding bugs.</p>
<li> <p><b><a href='/p0f3/'>P0f</a></b>, a popular tool for passively detecting operating systems on remote machines.</p>
<li> <p><b><a href='https://code.google.com/p/skipfish/'>Skipfish</a></b>, a web security testing tool is now a cog in the <a href='https://cloud.google.com/tools/security-scanner/'>Google Cloud Security Scanner</a>.</p>
<li> <p><b><a href='https://code.google.com/p/ratproxy/'>Ratproxy</a></b>, a neat but non-maintained passive web vulnerability detection tool.</p>
<li> <p><b><a href='/soft/memfetch.tgz'>Memfetch</a></b>, a simple utility to take non-destructive snapshots of process address space.</p>
<li> <p><b><a href='/soft/stompy.tgz'>Stompy</a></b>, a fairly sophisticated token randomness evaluation tool.</p>

<li> <p><b>Assorted purpose-built fuzzers:</b> too many to list, but some of the most successful examples are
<a href='/cross_fuzz/'>cross_fuzz</a>,
<a href='/ref_fuzz5.html'>ref_fuzz</a>,
<a href='/soft/mangleme.tgz'>mangleme</a>,
<a href='http://code.google.com/p/dom-checker/'>DOM checker</a>,
<a href='/canvas/'>canvas fuzzer</a>, 
<a href='/soft/jsfuzz.tgz'>jsfuzz</a>, or
<a href='transfuzz.html'>transition fuzz</a>.</p>

<li> <p><b>Tools of historical interest:</b>
<a href='/soft/tmin.tgz'>tmin</a>,
<a href='/soft/fl0p-devel.tgz'>fl0p</a>,
<a href='/soft/0trace.tgz'>0trace</a>,
<a href='/fenris/'>Fenris</a>,
<a href='/soft/unlocker.txt'>unlocker</a>,
<a href='/soft/fakebust.tgz'>fakebust</a>,
<a href='/soft/snowdrop.tgz'>snowdrop</a>,
<a href='/soft/bugger.tgz'>bugger</a>,
<a href='/soft/therev.tgz'>the revisionist</a>,
<a href='/soft/poink.zip'>poink</a>,
<a href='/soft/bunny-0.93.tgz'>bunny</a>,
<a href='/soft/unicorns.tgz'>unicorns</a>.</p>

<li> <p><b>World's best exploit:</b>
<a href='/soft/ld-expl'>ld-expl</a>. It still works - amaze your friends!</p>

</ul>
</fieldset>

</td><td>

<fieldset class=half>
<legend>Security-related writings</legend>
<ul>

<li> <p><b><a href='/tangled/'>The Tangled Web</a></b>, a holistic treatment of the web security model.</p>
<li> <p><b><a href='https://sites.google.com/a/chromium.org/dev/Home/chromium-security/client-identification-mechanisms'>A write-up on web tracking</a></b>, a pretty thorough and balanced overview of where we are.</p>
<li> <p><b><a href='http://lcamtuf.coredump.cx/postxss/'>Notes from the post-XSS world</a></b>, on the limitations of anti-XSS mechanisms such as CSP.</p>
<li> <p><b><a href='/css_calc/'>Doing algebra with CSS colors</a></b> to steal your browsing history.</p>
<li> <p><b><a href='/silence/'>Silence on the Wire</a></b>, my much earlier, 2005 book on reconnaissance and info leaks.</p>
<li> <p><b><a href='/oldtcp/tcpseq.html'>My 2001 ISN research</a></b> and a
<a href='/newtcp/'>2002 followup</a>, dealing with weaknesses in TCP/IP.</p>
<li> <p><b><a href='/ipfrag.txt'>IP fragmentation flaw</a></b>, an irreparable glitch affecting fragmented TCP packets.</p>
<li> <p><b><a href='/signals.txt'>Delivering signals for fun and profit</a></b>, an early note about an interesting class of security bugs.</p>
<li> <p><b><a href='/tsafe/'>Cracking safes with thermal imaging</a></b>, a whimsical experiment from 2005.</p>
<li> <p><b><a href='/tmp_paper.txt'>Lack of fdunlink()</a></b> and its implications for local privilege escalation bugs.</p>

<li> <p><b>Mostly of historical interest:</b>
<a href='https://code.google.com/p/browsersec/'>BSH</a>,
<a href='/strikeout/'>strike that out</a>,
<a href='/juggling_with_packets.txt'>parasitic storage</a>,
<a href='http://phrack.org/issues/57/10.html'>rise of the robots</a>,
<a href='/mobp/'>mobp</a>.

<li> <p><b><a href='https://bbs.xdsec.org/t/sec'>My blog</a></b> is a good way to stay in the loop on my security work and on individual vulns.</p>

</ul>
</fieldset>

</td></tr><tr><td>

<fieldset class=half>
<legend>Robotics and CNC</legend>
<ul>

<li> <p><b><a href='/gcnc/'>Guerrilla guide to CNC</a></b>, an epic 60,000-word summary of my adventures making stuff.</p>
<li> <p><b><a href='/rstory/'>Perpetual robot works</a></b>, a behind-the-scenes story of how it all started.</p>
<li> <p><b>My <i>Make</i> articles</b> on
<a href='http://makezine.com/2013/02/14/3d-printing-revolution-the-complex-reality/'>3d printing</a>,
<a href='http://makezine.com/2014/03/21/resin-casting-going-from-cad-to-engineering-grade-plastic-parts/'>resin casting</a>,
<a href='http://makezine.com/2013/06/06/prototypes-that-last-simple-tips-for-making-durable-parts-part-1/'>part design part I</a>,
and <a href='http://makezine.com/2013/06/13/prototypes-that-last-simple-tips-for-making-durable-parts-part-2/'>part II</a>.</p>

<li> <p><b><a href='/electronics/'>Concise electronics for geeks</a></b>, a quick primer on basic concepts in circuit design.</p>

<li> <p><b>Robotics-related projects:</b>
<a href='/omni2/'>omnibot mk II</a>,
<a href='/tinybot/'>tinybot mk III</a>,
<a href='/25d/'>depth-augmented photography</a>,
<a href='/cycloid/'>cycloid gears</a>,
<a href='/ultimate/'>Shannon's ultimate machine</a>, and
<a href='/robots/'>assorted build process pics</a>.</p>

<li> <p><b>Other experiments:</b>

<a href='/naer/'>Silicon Valley radiation levels</a>,
<a href='/water/'>snapping droplets of water</a>,
<a href='/geiger/'>Geiger-Mueller mood lamp</a>,
<a href='/word/'>DHS tribute threat indicator</a>,
<a href='/lightbox/'>LED light surfaces</a>,
<a href='/edison_fuzz/'>figuring out Intel Edison</a>,
<a href='https://www.youtube.com/watch?v=20XS0lD7EWA'>infinity mirror</a>,
<a href='https://www.youtube.com/watch?v=5SDIHSeiG9A'>plasma glow</a>.</p>

</ul>
</fieldset>

</td><td>

<fieldset class=half>
<legend>Hobby and misc</legend>
<ul>

<li> <p><b><a href='/photo/current/'>My photo gallery</a></b>. Photography is my long-time hobby, going back to the 90s.</p>

<li> <p><b><a href='https://bbs.xdsec.org/t/sec'>Assorted essays</a></b> about Poland, Europe, and the United States.</p>

<li> <p><b><a href='/prep/'>What to do when the zombies come</a></b>, a guide to level-headed disaster preparedness.</p>

<li> <p><b><a href='https://bbs.xdsec.org/t/sec'>My LinkedIn profile</a></b>, in case you're into that sort of thing. I work at Google.</p>

<li> <p><b>Hackers you may want to know:</b>
<a href='http://f1sh.site/'>F1sh</a>,
<a href='http://www.pupiles.com'>Pupiles</a>,
<a href='http://www.k0rz3n.com/'>K0rz3n</a>,
<a href='https://www.tharavel.site/'>Tharavel</a>,
<a href='http://notwo1f.tk/'>Notwolf</a>,
<a href='http://iruby.me/'>Triqry</a>,
<a href='https://nen9ma0.github.io/'>Nen9ma0</a>,
<a href='http://feiyyx.cc/'>Feiyyx</a>,
</p>

<li> <p><b>Ancient or pointless non-security stuff:</b>
<a href='/evilfinder/'>evil finder</a>,
<a href='/catty.shtml'>catty</a>,
<a href='/b3.shtml'>blog generator</a>,
<a href='/wss/'>Stella</a>,
<a href='http://eprovisia.coredump.cx/'>eProvisia</a>,
<a href='/seekers/'>lost souls</a>,
<a href='http://argante.sourceforge.net/'>Argante</a>,
<a href='/soft/hardcore.tgz'>hc</a>,
<a href='/vuln_calc/'>VLSS</a>,
and other assorted stuff in <a href='/soft/'>this directory</a>.
</p>

<li> <p><b>If you want to contact me,</b>
simply drop a mail to <a href='https://bbs.xdsec.org/t/sec'>My Email Address</a>.</p>

</ul>
</fieldset>

</td></tr></table>

<p class=foot>
That's all. You are a visitor number <!-- Shake, shake, shake... -->17719045.
</p>
</html>

