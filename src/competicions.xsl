<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:template match="/">
  
  <html>
    <head>
        <title>Competicions - Top Gym</title>
        <link rel="stylesheet" href="src/css/reset.css"/>
        <link rel="stylesheet" href="src/css/bootstrap-4.6.1/bootstrap.min.css"/>
        <link rel="stylesheet" href="src/css/fontawesome/all.min.css"/>
        <link rel="stylesheet" href="src/css/style.css"/>
    </head>
    <body class="xml-page">
        <header>
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-sm">
                    <!-- logo -->
                    <a class="logo xml-logo xml-logo_header" href="index.php">
                        <!-- <img src="src/img/logo-v4.png" class="img-fluid" alt="Top gym - El dolor es temporal"> -->
                    </a>
                    <!-- burguer button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#burguerMenu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <!-- nav -->
                    <div class="collapse navbar-collapse justify-content-sm-end" id="burguerMenu">   
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#activitats">Activitats</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="competicions.xml">Competicions</a>
                            </li>
                            <li class="nav-item user-header">
                                <a class="nav-link" href="login.php">Entrar</a>
                            </li>
                            <li class="nav-item sortir">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </li>            
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div id="competicions" class="container">
            <h1 class="h1">Competicions</h1>
            <section class="row card-section card-section_competicio">
                <xsl:for-each select="competicions/competicio">
                    <xsl:sort select="name" />
                    
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card" >
                                <figure>
                                <xsl:element name="img">
                                    <xsl:attribute name="src">
                                        <xsl:value-of select="image/@src"/>
                                    </xsl:attribute>
                                    <xsl:attribute name="class">
                                        card-img-top
                                    </xsl:attribute>
                                </xsl:element>
                                </figure>
                                <div class="card-body">
                                    <h2 class="h4"><xsl:value-of select="name"></xsl:value-of></h2>
                                    <p class="card-text"><span class="text-muted text-size-sm">Data:</span><span><xsl:value-of select="date"></xsl:value-of></span></p>
                                    <p class="card-text"><span class="text-muted text-size-sm">Descripció:</span></p>
                                    <p class="card-text"><xsl:value-of select="description"></xsl:value-of></p>
                                    <xsl:element name="button">
                                        <xsl:attribute name="id">
                                            <xsl:value-of select="button/@id"/>
                                        </xsl:attribute>
                                        <xsl:attribute name="class">
                                            btn btn-primary
                                        </xsl:attribute>
                                        <xsl:attribute name="type">
                                            button
                                        </xsl:attribute>
                                    </xsl:element>
                                </div>
                            </div>
                        </div>
                    
                </xsl:for-each>
            </section>
        </div>
        <div class="container">
            <footer class="d-flex flex-wrap border-top">
                <p class="col-md-5 mb-0 text-muted">© 1<sup>er</sup> de DAM - Projecte 2</p>
                <a class="logo xml-logo xml-logo_footer" href="index.php">
                    <!-- <img src="src/img/logo-v4.png" class="img-fluid" alt="Top gym - El dolor es temporal"> -->
                </a>
                <ul class="nav col-md-5">
                    <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
                    <li class="nav-item"><a href="index.php#activitats" class="nav-link px-2 text-muted">Activitats</a></li>
                    <li class="nav-item"><a href="competicions.xml" class="nav-link px-2 text-muted">Competicions</a></li>
                </ul>
            </footer>
        </div>
        
        <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
        <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
        <script src="src/js/competicions.js"></script>
    </body>
  </html>
  
  </xsl:template>
</xsl:stylesheet>
