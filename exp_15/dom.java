import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.DocumentBuilder;
import org.w3c.dom.*;

public class dom {

    public static void main(String[] args) {
        try {
            // 1. Create a DOM Document object
            DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
            DocumentBuilder builder = factory.newDocumentBuilder();
            Document document = builder.parse("priceList.xml");

            // 2. Get the root element
            Element root = document.getDocumentElement();
            System.out.println("Root Element: " + root.getNodeName());

            // 3. Traverse the document from the root
            NodeList childNodes = root.getChildNodes();

            for (int i = 0; i < childNodes.getLength(); i++) {
                Node node = childNodes.item(i);

                // Process only element nodes (not whitespace)
                if (node.getNodeType() == Node.ELEMENT_NODE) {
                    System.out.println("\nNode Name: " + node.getNodeName());

                    if (node.hasChildNodes()) {
                        NodeList itemChildren = node.getChildNodes();

                        for (int j = 0; j < itemChildren.getLength(); j++) {
                            Node child = itemChildren.item(j);

                            if (child.getNodeType() == Node.ELEMENT_NODE) {
                                System.out.println("  " + child.getNodeName() + ": " + child.getTextContent());
                            }
                        }
                    }
                }
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
