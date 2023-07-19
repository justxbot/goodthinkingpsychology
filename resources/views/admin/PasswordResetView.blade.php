<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Responsive Email Template</title>
    <style>

    </style>
</head>
<body>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#dfbec3">
        <tr>
            <td align="center" valign="top">
                <table cellpadding="0" cellspacing="0" border="0" width="600" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 20px;">
                            <h1 style="font-size: 24px; color:#0b0449;">Forgot password?</h1>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top" style="padding: 20px;">
                            <p style="font-size: 16px;">If this was not request by you please contact us immediately.</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top" style="padding: 20px;">
                            <a href="http://127.0.0.1:8000/__security_firewall_1/reset/{{ $token }}" style="display: inline-block; padding: 10px 20px; background-color: #0b0449; color: #fff; text-decoration: none; font-size: 16px;   box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;">Reset password</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
