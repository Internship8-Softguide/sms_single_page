const sendPostRequest = async (url, request) => {
    return await $.ajax({
        url: url,
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(request),
        dataType: "json",
    });
};

const sendUpdateRequest = async (url, request) => {
    return await $.ajax({
        url: url,
        type: "PUT",
        contentType: "application/json",
        data: JSON.stringify(request),
        dataType: "json",
    });
};

const sendGetRequest = async (url) => {
    return await $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
    });
};

const sendDeleteRequest = async (url) => {
    return await $.ajax({
        url: url,
        type: "DELETE",
        dataType: "json",
    });
};
