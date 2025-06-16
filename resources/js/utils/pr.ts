export default function pr<T>(value: T, title: string = '') {
    if (title) title = `( ${title} )`;
    console.log(` -=-=-=-=-=-=-=${title}-=-=-=-=-=-=-=`);
    console.log(value);
    console.log('');
    return value;
}
