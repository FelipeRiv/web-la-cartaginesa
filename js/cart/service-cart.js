
// const URL = '';

const frmFormData = (form) => {

    

};

const sendCart = async (URL, data = {}) => {

    const resp = await fetch(URL, {
        method: 'POST',
        body: data
    });

    return resp.json();
};