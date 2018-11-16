<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@taglib uri="http://www.springframework.org/tags/form" prefix="form"%>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Product</title>

    <link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath}/styles.css">

</head>
<body>

<jsp:include page="_header.jsp" />
<jsp:include page="_menu.jsp" />

<div class="page-title">Register</div>

<c:if test="${not empty errorMessage }">
    <div class="error-message">
            ${errorMessage}
    </div>
</c:if>

<form:form modelAttribute="accountForm" method="POST" enctype="multipart/form-data">
    <table style="text-align:left;">
        <tr>
            <td>Username *</td>
            <td style="color:red;">
                <c:if test="${not empty accountForm.userName}">
                    <form:hidden path="userName"/>
                    ${accountForm.userName}
                </c:if>
                <c:if test="${empty accountForm.userName}">
                    <form:input path="userName" />
                    <form:hidden path="userName" />
                </c:if>
            </td>
            <td><form:errors path="userName" class="error-message" /></td>
        </tr>

        <tr>
            <td>Password *</td>
            <td><form:input path="password" type="password"/></td>
            <td><form:errors path="password" class="error-message" /></td>
        </tr>

        <tr>
            <td>Role *</td>
            <td><form:input path="userRole" value="CUSTOMER" /></td>
            <td><form:errors path="userRole" class="error-message" /></td>
        </tr>
        <tr>
            <td>Active *</td>
            <td><form:input path="active" value="1" /></td>
            <td><form:errors path="active" class="error-message" /></td>
        </tr>



        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Submit" /> <input type="reset"
                                                              value="Reset" /></td>
        </tr>
    </table>
</form:form>




<jsp:include page="_footer.jsp" />

</body>
</html>