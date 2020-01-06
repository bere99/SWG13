<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="2.0">
<xsl:template match="/">
<html>
<body>
 
  <h2>Tabla de preguntas</h2>
    <table border="1">
        <tr bgcolor="skyblue">
            <th>Autor</th>
            <th>Enunciado</th>
            <th>Respuesta correcta</th>
            <th>Respuestas incorrectas</th>
            <th>Tema</th> 
        </tr>

    <xsl:for-each select="assessmentItems/assessmentItem">
        <tr>
            <td><xsl:value-of select="@author"/></td>
            <td><xsl:value-of select="itemBody/p"/></td>
            <td><xsl:value-of select="correctResponse/value"/></td>
            <td>
                <ul>
                    <xsl:for-each select="incorrectResponses/value">
                     <li><xsl:value-of select="."/></li>
                    </xsl:for-each>
                </ul>
            </td>
            <td><xsl:value-of select="@subject"/></td>
        </tr>
    </xsl:for-each>
    </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>