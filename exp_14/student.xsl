<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/student">
    <html>
      <head>
        <title>Student Details</title>
        <style>
          body { font-family: Arial; padding: 20px; }
          table { border-collapse: collapse; width: 50%; }
          th, td { border: 1px solid #aaa; padding: 8px; text-align: left; }
          th { background-color: #f0f0f0; }
        </style>
      </head>
      <body>
        <h2>Student Details</h2>
        <table>
          <tr><th>Name</th><td><xsl:value-of select="name"/></td></tr>
          <tr><th>Roll Number</th><td><xsl:value-of select="rollno"/></td></tr>
          <tr><th>Branch</th><td><xsl:value-of select="branch"/></td></tr>
        </table>

        <h3>Subjects</h3>
        <ul>
          <xsl:for-each select="subjects/subject">
            <li><xsl:value-of select="."/></li>
          </xsl:for-each>
        </ul>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>